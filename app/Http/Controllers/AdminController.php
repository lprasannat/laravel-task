<?php

namespace App\Http\Controllers;

use App\Link;
use App\Continent;
use App\Country;
use App\City;
use App\State;
use App\Currency;
use Laravel\Socialite\Two\GoogleProvider;
use Laravel\Socialite\Facades\Socialite;
use DateTimeZone;
use PDF;
use Excel;
use Datatables;
use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\AddUser;
use App\Uploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Logs;
use DateTime;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Location;
use Illuminate\Support\Facades\Crypt;
use App\TimeZone;

class AdminController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        return view('include/welcome');
    }

    public function index() {
        return view('include/Index');
    }

    public function register() {
        session()->regenerate();
        return view('include/Registration');
    }

    public function registerstep() {
        session()->regenerate();
        $FullName = Input::get('FullName');
        $Address = Input::get('Address');
        $City = Input::get('City');
        $State = Input::get('State');
        session(['FullName' => $FullName, 'Address' => $Address, 'City' => $City, 'State' => $State]);

        return view('include/RegistrationStep2');
    }

    public function registersteps() {
        session()->regenerate();
        $Mobile = Input::get('Phonenumber');
        $Email = Input::get('Email');
        session(['PhoneNumber' => $Mobile, 'EmailId' => $Email]);
        $data['FullName'] = session::get('FullName');
        $data['Address'] = session::get('Address');
        $data['City'] = session::get('City');
        $data['State'] = session::get('State');
        $data['PhoneNumber'] = session::get('PhoneNumber');
        $data['EmailId'] = session::get('EmailId');
        return view('include/RegistrationStep3', ['temp' => $data]);
    }

    public function getValues() {
        session()->regenerate();
        $ldate = new DateTime;
        $hours = $ldate->format('H:i');

        $hours = explode(":", $hours);
        $hours = implode("", $hours);

        $spcl_char = '!@#$%&*()_=+]}[{;:,<.>?|';
        $spcl_char = str_shuffle($spcl_char);
        $spcl_char = substr($spcl_char, 0, 5);
        $FullName = Input::get('FullName');
        $Address = Input::get('Address');
        $City = Input::get('City');
        $State = Input::get('State');


        $FullName = strtolower($FullName);
        $City = strtolower($City);
        $State = strtolower($State);
        $string = $City . $State;
        $com = $string . $FullName;
        $com = str_split($com);
        $alphabets = str_split("abcdefghijklmnopqrstvuwxyz");
        $string = str_split($string);
        $name = str_split($FullName);
        $arr = null;
        $ex = null;
        $count = 0;
        for ($x = 0; $x < count($string); $x++) {
            $count = 0;
            for ($y = 0; $y < count($name); $y++) {
                if ($string[$x] == $name[$y]) {
                    $count = 1;
                }
            }
            if ($count == 0) {
                $arr.= $string[$x];
            }
        }
//        echo $arr, "<br>";
        if (strlen($arr) < 11) {
            $length = strlen($arr);
            for ($x = 0; $x < count($alphabets); $x++) {
                $count = 0;
                for ($y = 0; $y < count($com); $y++) {
                    if ($alphabets[$x] == $com[$y]) {
                        $count = 1;
                    }
                }
                if ($count == 0) {
                    $ex.= $alphabets[$x];
                }
                if (strlen($ex) + $length == 11) {
                    $x = count($alphabets);
                }
            }
        }

        $string = $arr . $ex;

        $upper = strtoupper(substr($string, 0, 2));
        $rand = str_shuffle($spcl_char . $hours . $upper);
        $str = str_shuffle(substr($string, 2, 9));


        $message = substr($str, 0, 4) . $rand . substr($str, 4, 5);




        $validator = Validator::make(Input::all(), array(
                    'Email' => 'required|max:50|email',
                    'FullName' => 'required|max:20|min:3',
                    'City' => 'required|min:6',
                    'Phonenumber' => 'required|digits:10|numeric',
        ));
        if ($validator->fails()) {
            return Redirect::route('registration')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $Email = Input::get('Email');
//   echo $Email;
            $val = Mail::raw($message, function ($message)use($Email) {

                        $message->from('lakshmi.nadella@karmanya.co.in', 'lakshmi');
                        $message->to($Email)->subject("Generated Password");
                    });
            if ($val) {
                $success = null;
                $success.="Mails sent successfully";
            } else {
                $success.="Mails not send";
            }
            $FullName = Input::get('FullName');
            $Address = Input::get('Address');
            $City = Input::get('City');
            $State = Input::get('State');
            $PhoneNumber = Input::get('Phonenumber');
            $EmailId = Input::get('Email');
            $message = md5($message);
            $user = AddUser::create(['FullName' => $FullName, 'Address' => $Address, 'City' => $City, 'State' => $State, 'PhoneNumber' => $PhoneNumber, 'EmailId' => $EmailId, 'Password' => $message]);
            if ($user) {
                $success.= "Successfully registered";
            } else {
                $success.= "registration fails pls try again";
            }
        }
        return view('include/Registration', ['success' => $success]);
    }

    public function loginNext(Request $request) {
        session()->regenerate();
        $Email = Input::get('Email');
        $Password = Input::get('Password');
        session(['Email' => $Email]);
        $HashPassword = md5($Password);
//        echo $HashPassword;

        $DbPassword = AddUser::select('Password', 'Id')->where('EmailId', $Email)->first();
        $DbPassword = json_decode(json_encode($DbPassword), true);
        session(['Id' => $DbPassword['Id']]);
//        print_r($DbPassword);

        foreach ($DbPassword as $value) {
            if ($HashPassword == $value) {
                $Object = new AdminController();
                $obj = $Object->logdetails($request);
                $Addresses = session::get('Address');
                return view('include/LoginDetails', ['logs' => $obj]);
            } else {
                $error = "invalid credentials";
                return view('include/Index', ['error' => $error]);
            }
        }
    }

    public function update() {
        session()->regenerate();
        $browserDetails = AddUser::select('FullName', 'Address', 'City', 'State', 'PhoneNumber', 'EmailId')->where('EmailId', session::get('Email'))->first();
        $browserDetails = json_decode(json_encode($browserDetails), TRUE);
        return view('include/Update', ['temp' => $browserDetails]);
    }

    public function onUpdate() {
        session()->regenerate();
        $FullName = Input::get('FullName');
        $Address = Input::get('Address');
        $City = Input::get('City');
        $State = Input::get('State');
        $PhoneNumber = Input::get('Phonenumber');
        $EmailId = Input::get('Email');
        $CreditCardNumber = Input::get('CreditCardNumber');
        $encrypted = Crypt::encrypt($CreditCardNumber);
        $data = AddUser::where('EmailId', session::get('Email'))->update(
                ['FullName' => $FullName,
                    'Address' => $Address,
                    'City' => $City,
                    'State' => $State,
                    'PhoneNumber' => $PhoneNumber,
                    'EmailId' => $EmailId, 'CreditCardNumber' => $encrypted
        ]);
        if ($data == 1) {
            return Redirect::route('updates')->with('update', "successfully updated");
        } else {
            return Redirect::route('updates')->with('fail', 'updation failed pls try again');
        }
    }

    public function ChangePassword() {
        session()->regenerate();
        $password = AddUser::select('Password')->where('EmailId', session::get('Email'))->first();
        $password = json_decode(json_encode($password), TRUE);
        return view('include/PasswordUpdate', ['password' => $password]);
    }

    public function password() {
        session()->regenerate();
        $password = Input::get('Password');

        $password = md5($password);
        $update = AddUser::where('EmailId', session::get('Email'))->update([
            'Password' => $password,
        ]);
        if ($update) {
            return Redirect::route('updatepasswords')
                            ->with('password', 'Successfully Updated');
        } else {
            return Redirect::route('updatepasswords')
                            ->with('password', 'Problem in updating.Try again later!');
        }
    }

    public function logout() {
        session()->regenerate();
        session(['Email' => null]);
        return Redirect::route('indlogin')->with('logout', 'Successfully loggedout');
    }

    public function maps() {
        return view('include/userlocation');
    }

    public function FileUpload() {

        return view('include/FileUpload');
    }

    public function upload() {
        session()->regenerate();
        $input = Input::file('file');
        $file_name = $input->getClientOriginalName();
        $file_size = $input->getClientSize();
        $file_type = $input->getClientMimeType();
        $input->move("Upload", $input->getClientOriginalName());
        Uploads::create(['File' => $file_name, 'Type' => $file_type, 'Size' => $file_size, 'EmailId' => Session::get('Email')]);
    }

    public function getData() {
        session()->regenerate();
        $output_array = [];
        session()->regenerate();


        $get_file = Uploads::select('Id', 'File', 'Type', 'Size')
                        ->where('EmailId', session::get('Email'))->get();
// $get_file = json_decode(json_encode($get_file), TRUE);

        $data = $get_file;
//$get_file= json_encode($get_file);
        return view('include/uploadedfiles', ['result' => $data]);
    }

    public function forgotPasswordView() {
        return view('include/ForgotPassword');
    }

    public function forgotPassword() {
        session()->regenerate();
        $EmailId = Input::get('EmailId');
        $value = AddUser::select('Password')->where('EmailId', Session::get('Email'))->get();
        $value = json_decode(json_encode($value), true);
        foreach ($value as $values) {
            foreach ($values as $val) {

                if (!$val) {
                    return Redirect::route('forgotpassword')
                                    ->with('message', 'This email address is not registered');
                } else {
                    $ldate = new DateTime;
                    $hours = $ldate->format('H:i');

                    $hours = explode(":", $hours);
                    $hours = implode("", $hours);

                    $spcl_char = '!@#$%&*()_=+]}[{;:,<.>?|';
                    $spcl_char = str_shuffle($spcl_char);
                    $spcl_char = substr($spcl_char, 0, 5);
                    $FullName = Input::get('FullName');
                    $Address = Input::get('Address');
                    $City = Input::get('City');
                    $State = Input::get('State');


                    $FullName = strtolower($FullName);
                    $City = strtolower($City);
                    $State = strtolower($State);
                    $string = $City . $State;
                    $com = $string . $FullName;
                    $com = str_split($com);
                    $alphabets = str_split("abcdefghijklmnopqrstvuwxyz");
                    $string = str_split($string);
                    $name = str_split($FullName);
                    $arr = null;
                    $ex = null;
                    $count = 0;
                    for ($x = 0; $x < count($string); $x++) {
                        $count = 0;
                        for ($y = 0; $y < count($name); $y++) {
                            if ($string[$x] == $name[$y]) {
                                $count = 1;
                            }
                        }
                        if ($count == 0) {
                            $arr.= $string[$x];
                        }
                    }
//        echo $arr, "<br>";
                    if (strlen($arr) < 11) {
                        $length = strlen($arr);
                        for ($x = 0; $x < count($alphabets); $x++) {
                            $count = 0;
                            for ($y = 0; $y < count($com); $y++) {
                                if ($alphabets[$x] == $com[$y]) {
                                    $count = 1;
                                }
                            }
                            if ($count == 0) {
                                $ex.= $alphabets[$x];
                            }
                            if (strlen($ex) + $length == 11) {
                                $x = count($alphabets);
                            }
                        }
                    }

                    $string = $arr . $ex;

                    $upper = strtoupper(substr($string, 0, 2));
                    $rand = str_shuffle($spcl_char . $hours . $upper);
                    $str = str_shuffle(substr($string, 2, 9));


                    $message = substr($str, 0, 4) . $rand . substr($str, 4, 5);
                    $password = Mail::raw($message, function ($message)use($EmailId) {

                                $message->from('lakshmi.nadella@karmanya.co.in', 'lakshmi');
                                $message->to($EmailId)->subject("your Password");
                            });
                    if ($password) {
                        $success = null;
                        $success.="Mails sent successfully";
                    } else {
                        $success.="Mails not send";
                    }
                    $message = md5($message);
                    $user = AddUser::where('EmailId', Session::get('Email'))->update(['Password' => $message]);
                }
            }
        }
        return view('include/ForgotPassword', ['success' => $success]);
    }

    public function viewProfile() {
        session()->regenerate();
        $value = DB::table('AdminLte')->select('CreditCardNumber')->where('EmailId', Session::get('Email'))->get();
        $value = json_decode(json_encode($value));
        foreach ($value as $i) {
            global $result;
            $result = $i->CreditCardNumber;
            $result = Crypt::decrypt($result);
        }

        $getdata = AddUser::select('FullName', 'Address', 'City', 'State', 'PhoneNumber', 'EmailId')->where('EmailId', Session::get('Email'))->get();
        $getdata = json_decode(json_encode($getdata), true);
        foreach ($getdata as $data) {
            return view('include/ViewProfile', ['temp' => $data, 'results' => $result]);
        }
    }

    public function timeZone() {

        function timezone_list() {
            static $timezones = null;

            if ($timezones === null) {
                $timezones = [];
                $offsets = [];
                $now = new DateTime();

                foreach (DateTimeZone::listIdentifiers() as $timezone) {
                    $time = $now->setTimezone(new DateTimeZone($timezone));
                    $time = json_decode(json_encode($time), true);
// echo $time['date'];
                    $offsets[] = $offset = $now->getOffset();
                    TimeZone::create(['Name' => format_timezone_name($timezone), 'Offset' => format_GMT_offset($offset)]);
                    $timezones[$timezone] = '(' . format_GMT_offset($offset) . ') ' . format_timezone_name($timezone);
                }
            }

            return $timezones;
        }

        function format_GMT_offset($offset) {
            $hours = intval($offset / 3600);
            $minutes = abs(intval($offset % 3600 / 60));
            return ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
        }

        function format_timezone_name($name) {
            $name = str_replace('/', ', ', $name);
            $name = str_replace('_', ' ', $name);
            $name = str_replace('St ', 'St. ', $name);
            return $name;
        }

        $timezone = timezone_list();

        $data = TimeZone::select(['Id', 'Name', 'Offset'])->get();

        return view('include/TimeZone', ['result' => $data]);
    }

    public function dataTimeZone($data) {

        $User = DB::table('TimeZone')->select("*")->where('Id', '=', $data)->get();
        $User = json_decode(json_encode($User), true);
        return view('include/TimeZoneEdit', compact('User'));
    }

    public function ViewdataTimeZone($data) {

        $User = DB::table('TimeZone')->where('Id', '=', $data)->select('*')->get();


        $User = json_decode(json_encode($User), true);
// print_r($User);

        return view('include/ViewdataTimeZone', compact('User'));
    }

    public function dataTimeZoneDelete($data) {
        DB::table('TimeZone')->where('Id', '=', $data)->delete();
        $User = DB::table('TimeZone')->select("*")->where('Id', '=', $data)->get();

        $User = json_decode(json_encode($User), true);
        return view('include/dataTimeZoneDelete', compact('User'));
    }

    public function SaveRows() {
        $ID = Input::get('Id');
        $Name = Input::get('Name');
        $Offset = Input::get('Offset');
        DB::table('TimeZone')->where('Id', '=', $ID)->update(['Name' => $Name, 'Offset' => $Offset]);

        $UserUpdate = DB::table('TimeZone')->select("*")->where('Id', '=', $ID)->get();
        $UserUpdate = json_decode(json_encode($UserUpdate), true);
//print_r($User);
        return view('include/RowUpdate', compact('UserUpdate'));
    }

    public function excelFormatAdminLte() {
        $users = AddUser::select('*')->get();
        Excel::create('AdminLte', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    public function excelFormatLogs() {
        $users = Logs::select('*')->get();
        Excel::create('Logs', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    public function excelFormatTimeZone() {
        $users = TimeZone::select('*')->get();
        Excel::create('TimeZone', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    public function excelFormatUpload() {
        $users = Uploads::select('*')->get();
        Excel::create('Uploads', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('xls');
    }

    public function pdfFormatAdminLte() {
        $users = AddUser::select('*')->get();
        Excel::create('AddUser', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('pdf');
    }

    public function pdfFormatLogs() {
        $users = Logs::select('*')->get();
        Excel::create('Logs', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('pdf');
    }

    public function pdfFormatUploads() {
        $users = Uploads::select('*')->get();
        Excel::create('Uploads', function($excel) use($users) {
            $excel->sheet('Sheet 1', function($sheet) use($users) {
                $sheet->fromArray($users);
            });
        })->export('pdf');
    }

    public function pdfFormatTime() {
        $users = TimeZone::select('*')->get();
        return Excel::create('TimeZone', function($excel) use($users) {
                    $excel->sheet('Sheet 1', function($sheet) use($users) {
                        $sheet->fromArray($users);
                    });
                })->export('pdf');
    }

    public function redirectToProvider() {
        return Socialite::with('facebook')->redirect('facebooks');
    }

    public function handleProviderCallback() {
        session()->regenerate();
        $user = Socialite::with('facebook')->user();
        $token = $user->getId();
        $FaceBookUserName = $user->getName();
        $FaceBookUserEmail = $user->getEmail();
        session(['Email' => $FaceBookUserEmail]);
        $DbEmailId = AddUser::where('EmailId', $FaceBookUserEmail)->count();
        if ($DbEmailId == 0) {
            $NewUser = AddUser::create(['FullName' => $FaceBookUserName, 'EmailId' => $FaceBookUserEmail]);
            $UserToken = AddUser::where('EmailId', $FaceBookUserEmail)->update(['Token' => $token]);
            return Redirect::route('dashboard');
        } else {
            $RetriveEmail = AddUser::where('EmailId', $FaceBookUserEmail)->get();

            $LoginUser = AddUser::where('EmailId', $FaceBookUserEmail)->update(['Token' => $token]);

            return Redirect::route('dashboard');
        }
    }

    public function logdetails(Request $request) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $user['useragent'] = $request->server('HTTP_USER_AGENT');
        $input['ip'] = $request->ip();




        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";


        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $user['useragent'] = $request->server('HTTP_USER_AGENT');
        $input['ip'] = $request->ip();





//First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

// Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
                ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
// we have no matching number just continue
        }

// see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
//we will have two since we are not using 'other' argument yet
//see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

// check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        $u = array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );

        $yourbrowser = ['userAgent' => $u_agent, 'name' => $bname, 'version' => $version, 'platform' => $platform, 'pattern' => $pattern];
        $jsonDetails = json_encode($yourbrowser);
//print_r($jsonDetails);
//                DB::table('AdminLte')->update(['userAgent' => $jsonDetails, 'name' => $yourbrowser['name'], 'version' => $yourbrowser['version'], 'platform' => $yourbrowser['platform'], 'pattern' => $yourbrowser['pattern'], 'ip' => $input['ip'], 'EmailId' => $Email]);
        Logs::create(['userAgent' => $jsonDetails,
            'ip' => $input['ip'],
            'name' => $yourbrowser['name'],
            'version' => $yourbrowser['version'],
            'platform' => $yourbrowser['platform'],
            'Email' => Session::get('Email'),
        ]);
        $browserDetails = Logs::select('userAgent', 'ip', 'name', 'version', 'platform', 'updated_at')->where('Email', Session::get('Email'))->orderBy('updated_at', 'desc')->take(5)->get();
        return $browserDetails;
//return view('include/RedirectDashBoard', ['values' => $browserDetails]);
    }

    public function redirectDashBoard(Request $request) {
        $Object = new AdminController();
        $obj = $Object->logdetails($request);
        return view('include/LoginDetails', ['logs' => $obj]);
    }

    public function google() {
        return Socialite::with('google')->redirect('google/callback');
    }

    public function googleCallback(Request $request) {
        $user = Socialite::with('google')->user();
        $token = $user->getId();
        $UserName = $user->getName();
        $UserEmail = $user->getEmail();
        session(['Email' => $UserEmail]);
        $DbEmailId = AddUser::where('EmailId', $UserEmail)->count();
        if ($DbEmailId == 0) {
            $NewUser = AddUser::create(['FullName' => $UserName, 'EmailId' => $UserEmail]);
            $UserToken = AddUser::where('EmailId', $UserEmail)->update(['Token' => $token]);
            return Redirect::route('dashboard');
        } else {
            $RetriveEmail = AddUser::where('EmailId', $UserEmail)->get();

            $LoginUser = AddUser::where('EmailId', $UserEmail)->update(['Token' => $token]);

            return Redirect::route('dashboard');
        }
    }

    public function redirectgoogleDashBoard(Request $request) {
        $Object = new AdminController();
        $obj = $Object->logdetails($request);
        return view('include/LoginDetails', ['logs' => $obj]);
    }

    public function linkedin() {
        return Socialite::with('linkedin')->redirect('linkedin/callback');
    }

    public function linkedinCallback() {
        $user = Socialite::with('linkedin')->user();
        $token = $user->getId();
        $UserName = $user->getName();
        $UserEmail = $user->getEmail();
        session(['Email' => $UserEmail]);
        $DbEmailId = AddUser::where('EmailId', $UserEmail)->count();
        if ($DbEmailId == 0) {
            $NewUser = AddUser::create(['FullName' => $UserName, 'EmailId' => $UserEmail]);
            $UserToken = AddUser::where('EmailId', $UserEmail)->update(['Token' => $token]);
            return Redirect::route('dashboard');
        } else {
            $RetriveEmail = AddUser::where('EmailId', $UserEmail)->get();

            $LoginUser = AddUser::where('EmailId', $UserEmail)->update(['Token' => $token]);

            return Redirect::route('dashboard');
        }
    }

    public function redirectlinkedinDashBoard(Request $request) {
        $Object = new AdminController();
        $obj = $Object->logdetails($request);
        return view('include/LoginDetails', ['logs' => $obj]);
    }

    public function ajaxcall(Request $request) {
        $lenght = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search');
        $order = $request->input('order');
        $column = $request->input('columns');
        $ajax = TimeZone::select('*')->limit($lenght)->offset($start)->get();
        $ajax = json_encode($ajax);
        $count = TimeZone::count();
        echo "{\"recordsTotal\":" . $count . ",\"recordsFiltered\":" . $count . ", \"data\":" . $ajax . "}";
    }

//------------------------------------------------------------------------------
//    Eloquent relationships----------------------------------------------------
//------------------------------------------------------------------------------
    public function hasValue() {
        //--------------------------------------------------------------------------------
//Getting all country in the Continent Id ----------------------------------------
//--------------------------------------------------------------------------------       
        echo "<h1>Getting Country values on Continent Id</h1>";
        $Country = Continent::find(1)->Country;
        foreach ($Country as $key) {
            echo "<strong>Continent Id:</strong> ", $key->ContinentId, "|| <strong> Country Name:</strong>", $key->CountryName, "<br>";
        }
        echo "<br><br>";
// -------------------------------------------------------------------------------     
//Getting the Continent Name of Country -----------------------------
//--------------------------------------------------------------------------------

        echo "<h1>Getting Continent values on Country Id:</h1>";
        $Continent = Country::find(1)->Continent;
        echo "<strong>Continent Id:</strong>", $Continent->Id, " ||<strong> Continent Name:</strong>", $Continent->ContinentName;
        echo "<br><br>";
//------------------------------------------------------------------------------------
//Getting the Country of the the State with Id --------------------------------------
//------------------------------------------------------------------------------------

        echo "<h1>Getting Country values on State Id:</h1>";
        echo "<strong>Country Id:</strong>", State::find(1)->Country->Id;
        echo "<strong>|| Country Name:</strong>", State::find(1)->Country->CountryName;
        echo "<br><br>";
//-----------------------------------------------------------------------------------        
//Print All States of the Country ------------------------------------
//-----------------------------------------------------------------------------------

        echo "<h1>Get All State which are in this Country Id </h1>";
        $State = Country::find(1)->State;
        foreach ($State as $key) {
            echo "<strong> Id:</strong> ", $key->Id, " ||<strong> Country Name:</strong>", $key->StateName, "<br>";
        }
        echo "<br><br>";

//--------------------------------------------------------------------------------------
// Print All Cities of the State ---------------------------------------------------
//--------------------------------------------------------------------------------------
        echo "<h1>Get All Cities in State :</h1>";
        $City = State::find(1)->City;
        foreach ($City as $key) {
            echo "<strong>State Id:</strong> ", $key->StateId, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }

//---------------------------------------------------------------------------------------
// Print The State Of a City-------------------------------------------------------------
//---------------------------------------------------------------------------------------
        echo "<h1>Get State Name of a City:</h1>";
        $Cityval = City::find(1)->State;
        echo "<strong>State Id: </strong>", $Cityval->Id, " ||<strong>State Name:</strong>", $Cityval->StateName;
        //---------------------------------------------------------------------------------------
// Print The State Of a Continent-------------------------------------------------------------
//---------------------------------------------------------------------------------------
        echo "<h1>Get All State Of a Continent :</h1>";
        $City = Continent::find(1)->State;
        foreach ($City as $key) {
            echo "<strong>State Id:</strong> ", $key->Id, " ||<strong> State Name:</strong>", $key->StateName, "<br>";
        }
        //---------------------------------------------------------------------------------------
// Print The cities Of a Continent-------------------------------------------------------------
//---------------------------------------------------------------------------------------
        echo "<h1>Get All cities Of a Continent :</h1>";
        $City = Continent::find(1)->City;
        foreach ($City as $key) {
            echo "<strong>City Id:</strong> ", $key->Id, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }
        //---------------------------------------------------------------------------------------
// Print The cities Of a Country-------------------------------------------------------------
//---------------------------------------------------------------------------------------
        echo "<h1>Get All cities Of a Country :</h1>";
        $City = Country::find(1)->City;
        foreach ($City as $key) {
            echo "<strong>City Id:</strong> ", $key->Id, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }
//------------------------------------------------------------------------------------
//Getting the Continent of the the State with Id --------------------------------------
//------------------------------------------------------------------------------------

        echo "<h1>Getting Continent values on State Id:</h1>";
        $City = Continent::find(1)->Continent;
        foreach ($City as $key) {
            echo "<strong>StateId:</strong>", $key->Id, "||" . "<strong>continent Id:</strong> ", $key->ContinentId, " ||<strong> Continent Name:</strong>", $key->StateName, "<br>";
        }
        //------------------------------------------------------------------------------------
//Getting the country of the the State with Id --------------------------------------
//------------------------------------------------------------------------------------

        echo "<h1>Getting country values on State Id:</h1>";
        $City = Country::find(1)->Cities;
        foreach ($City as $key) {
            echo "<strong>City Id:</strong>", $key->Id, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }
        //------------------------------------------------------------------------------------
//Getting the country of the the State with Id --------------------------------------
//------------------------------------------------------------------------------------

        echo "<h1>Getting morph values on State Id:</h1>";
        $post = State::find(1);

        foreach ($post->City as $like) {
            echo "<strong>City Id:</strong>", $key->Id, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }
        //------------------------------------------------------------------------------------
//Getting the country of the the State with Id --------------------------------------
//------------------------------------------------------------------------------------

        echo "<h1>Getting morph values on country Id:</h1>";
        $post = Country::find(1);

        foreach ($post->City as $like) {
            echo "<strong>City Id:</strong>", $key->Id, " ||<strong> City Name:</strong>", $key->CityName, "<br>";
        }
    }

}

?>
