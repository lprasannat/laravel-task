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
//        DB::table('AdminLte')->insert(
//                ['FullName' => $FullName,
//                    'Address' => $Address,
//                    'City' => $City,
//                    'State' => $State
//        ]);
//        session(['name' => $FullName]);
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

//        print_r($data);
//        DB::table('AdminLte')->where('FullName', session('name'))->update([
//            'EmailId' => $Email,
//            'PhoneNumber' => $Mobile
//        ]);
//        $temparary = DB::table('AdminLte')->select('FullName', 'Address', 'City', 'State', 'EmailId', 'PhoneNumber')->where('FullName', session('name'))->get();
//        $temparary = json_decode(json_encode($temparary), TRUE);
//        DB::table('AdminLte')->truncate();

        return view('include/RegistrationStep3', ['temp' => $data]);
    }

    public function getValues() {
        session()->regenerate();
        $validate = Validator::make(Input::all(), array(
                    'Email' => 'required|max:50|email',
                    'FullName' => 'required|max:20|min:3',
                    'City' => 'required|min:6',
                    'Phonenumber' => 'required|digits:10|numeric',
                    'Address' => 'required'
        ));
        if ($validate->fails()) {
            return view('include/Registration',['errors'=>$validate]);
        } else {
            $FullName = Input::get('FullName');
            $Address = Input::get('Address');
            $City = Input::get('City');
            $State = Input::get('State');
            $PhoneNumber = Input::get('PhoneNumber');
            $EmailId = Input::get('EmailId');
            
            DB::table('AdminLte')->insert([
               'FullName' => $FullName,
               'Address' => $Address,
               'City' => $City,
               'State' => $State,
               'PhoneNumber' => $PhoneNumber,
               'EmailId' => $Email
           ]);
        }
        
    }

}

?>