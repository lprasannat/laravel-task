<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;
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
use Laravel\Socialite\Facades\Socialite;
class TaskController extends Controller {

    public function redirectToProvider() {
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderCallback() {
        $user = Socialite::with('facebook')->user();
       
    }

}
?>