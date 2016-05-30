<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;
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

// finally get the correct version number
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
// print_r($yourbrowser);
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
                $browserDetails = json_decode(json_encode($browserDetails), TRUE);
//print_r($browserDetails);



                $Addresses = session::get('Address');

                return view('include/LoginDetails', ['logs' => $browserDetails, 'Address' => $Addresses]);
            } else {
                $error = "invalid credentials";
                return view('include/Index', ['error' => $error]);
            }
        }
    }

    public function update() {
        session()->regenerate();
        $data = Session::get('Id');
        $browserDetails = AddUser::select('FullName', 'Address', 'City', 'State', 'PhoneNumber', 'EmailId')->where('Id', Session::get('Id'))->first();
        $browserDetails = json_decode(json_encode($browserDetails), TRUE);
        return view('include/Update', ['temp' => $browserDetails]);
    }

    public function onUpdate() {
        $FullName = Input::get('FullName');
        $Address = Input::get('Address');
        $City = Input::get('City');
        $State = Input::get('State');
        $PhoneNumber = Input::get('Phonenumber');
        $EmailId = Input::get('Email');
        $CreditCardNumber = Input::get('CreditCardNumber');
        $encrypted = Crypt::encrypt($CreditCardNumber);

        $data = AddUser::where('Id', session::get('Id'))->update(
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
        $password = AddUser::select('Password')->where('Id', Session::get('Id'))->first();
        $password = json_decode(json_encode($password), TRUE);
        return view('include/PasswordUpdate', ['password' => $password]);
    }

    public function password() {
        session()->regenerate();
        $password = Input::get('Password');

        $password = md5($password);
        $update = AddUser::where('Id', Session::get('Id'))->update([
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
        session(['Id' => null, 'EmailId' => null]);
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

        $output_array = [];
        session()->regenerate();


        $get_file = Uploads::select('Id', 'File', 'Type', 'Size')
                        ->where('EmailId', Session::get('Email'))->get();
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
        $tzlist = timezone_abbreviations_list();
        $tzlist = json_decode(json_encode($tzlist), true);
        foreach ($tzlist as $value) {
            foreach ($value as $val) {
                $offset = $val['offset'];
                $name = $val['timezone_id'];
                $result = TimeZone::create([
                            'name' => $name,
                            'offset' => $offset
                ]);
                $get_file = TimeZone::select('Id', 'name', 'offset')
                        ->get();
                //$get_file = json_decode(json_encode($get_file), TRUE);

                $data = $get_file;
                //$get_file= json_encode($get_file);
                return view('include/TimeZone', ['result' => $data]);
            }
        }
    }

    public function onTimeZone() {

        $get_file = TimeZone::select('Id', 'name', 'offset')->get();
        $get_file=  json_decode(json_encode($get_file),true);
        foreach($get_file as $value){
//            print_r($value);
       return view('include/TimeZoneEdit',['result'=>$value]);
        }
       
    }

}

?>