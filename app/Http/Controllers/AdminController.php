<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;
use DateTime;

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

    public function loginNext() {
        $EmailId = Input::get("EmailId");
        $Password = Input::get('Password');
        $HashPassword = md5($Password);
        $DbPassword = AddUser::select('Password')->where('EmailId', $EmailId)->first();
        $DbPassword = json_decode(json_encode($DbPassword), true);
        //print_r($DbPassword);
        if ($HashPassword == $DbPassword['Password']) {
            echo 'hi';
            //return Redirect::route('homepage');
        }
    }

}

?>