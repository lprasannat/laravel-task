<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BController@home'
));
//hit counter--------------------------------------------------
Route::get('/boot', array(
    'as' => 'boot',
    'uses' => 'hitcontroler@home'
));
//multiplefile upload------------------------------------------
Route::get('/multiple', 'multiplecontroller@index');
Route::post('/multipleupload', array(
    'as' => 'multiple',
    'uses' => 'multiplecontroller@multipleFile'
));
//currencyconversion--------------------------------------------
Route::get('/currencyconverter', 'currencycontroller@index');
Route::post('/currency', array(
    'as' => 'currencyconverter',
    'uses' => 'currencycontroller@converter'
));
//autosuggest---------------------------------------------------
Route::get('/autosuggest', 'autosuggestcontroller@index');
Route::post('/autosuggest', array(
    'as' => 'autosuggest',
    'uses' => 'autosuggestcontroller@auto'
));
//crosssite-----------------------------------------------------
Route::get("/Csrf", 'CsrfController@index');

Route::get('csrfprocess/{message}', array(
    'as' => 'csrfprocess',
    'uses' => 'CsrfController@indexsecond'
));
Route::post('Csrf', array(
    "as" => 'csrf',
    'uses' => 'CsrfController@csrf'
));
Route::get('/index', array(
    'as' => 'boot',
    'uses' => 'BController@exists'
));
//secure fileupload--------------------------------------
Route::get('/secure', 'SecureController@index');

Route::post('/secure', array(
    'as' => 'Secure',
    'uses' => 'SecureController@uploadFiles'
));
//string functions-------------------------------------
Route::get('/adddecimal', array(
    'as' => 'adddecimalpoint',
    'uses' => 'adddecimalpointcontroller@index'
));
Route::get('/htmlentities', array(
    'as' => 'htmlentities',
    'uses' => 'htmlentities@index'
));
Route::get('/namelength', array(
    'as' => 'namelength',
    'uses' => 'namelengthcontroller@index'
));
Route::get('/maxlength', array(
    'as' => 'maxlength',
    'uses' => 'maxlength@index'
));
Route::get('/nltobr', 'nl2brcontroller@index');
Route::post('/nl2brfile', array(
    'as' => 'nl2br',
    'uses' => 'nl2brcontroller@nl2br'
));
Route::get('/string', array(
    'as' => 'strtolower',
    'uses' => 'strtolowercontroller@index'
));
//find and replace-------------------------------------------------
Route::get('/findandreplace', 'finandreplacecontroller@home');
Route::post('/find', array(
    'as' => 'findandreplace',
    'uses' => 'finandreplacecontroller@index'
));
//up or down-------------------------------------------------------
Route::get('/upordown', 'upordowncontroller@home');
Route::post('/up', array(
    'as' => 'upordown',
    'uses' => 'upordowncontroller@up'
));
//template engine--------------------------------------------------
Route::get('/template', 'templateenginecontroller@home');
//guestbook--------------------------------------------------------
Route::get('/guestbook', 'guestbookcontroller@index');
Route::post('/guestbooks', array(
    'as' => 'guestbook',
    'uses' => 'guestbookcontroller@guest'
));
//transulate page lang------------------------------------------
Route::get('translate/{language}', array(
    "as" => 'translate',
    'uses' => 'TransulateController@translate'
));

Route::get('translatepage', array(
    "as" => 'translatepage',
    'uses' => 'TransulateController@main'
));
Route::any('menu/{language}', array(
    'as' => 'menu',
    'uses' => 'TransulateController@menu'));

// spellcheck-----------------------------------------------------------------------

Route::get('spellchecker', 'SpellcheckerController@spellcheck');
Route::post('checkspelling', 'SpellcheckerController@checkspelling');
//
//xmlfeed-----------------------------------------------------
Route::get('/xmlfeed', 'XmlfeedController@index');
//photoalbum--------------------------------------------------
Route::get('/photoalbum', array(
    'as' => 'index',
    'uses' => 'PhotoalbumController@index'));
Route::get('/photoalbum/{folder}', array(
    'as' => 'folder',
    'uses' => 'PhotoalbumController@folder'));

//search engine-----------------------------------------------
Route::get('/search', 'SearchengineController@index');
Route::post('/searches', array(
    'as' => 'Searchengine',
    'uses' => 'SearchengineController@search'));
//website rating-----------------------------------------------
Route::get('/WebsiteRating', array(
    'as' => 'websiteindex',
    'uses' => 'WebsiteRateController@index'
));
Route::get('/WebsiteRating/{item}/{rating}/{limit}', array(
    'as' => 'rating',
    'uses' => 'WebsiteRateController@rating'
));
//upload images----------------
Route::get('imageupload', 'ImageController@home');
//shout box----------------------
Route::get('shoutbox', array(
    'as' => 'shoutbox',
    'uses' => 'ShoutController@shout'));
Route::post('/ShoutBox-Upload', array(
    'as' => 'shoutboxsubmit',
    'uses' => 'ShoutController@shoutboxsubmit'
));

//chatApplication---------------------------------------
Route::get('chatbox/{name}', array(
    'as' => 'chatbox',
    'uses' => 'ChatWindowController@chat'));
Route::post('chatsubmit/', array(
    'as' => '/chatsubmit',
    'uses' => 'ChatWindowController@chatsubmit'
));
Route::post('getchat', array(
    'as' => '/getchat',
    'uses' => 'ChatWindowController@getchat'
));

//watermark------------------------------------------------
Route::get('/watermark', 'WatermarkController@index');
Route::post('watermarks/upload', array(
    'as' => 'water',
    'uses' => 'WatermarkController@home'));
//Route::post('watermarks/upload', array(
//    'as' => 'water',
//    'uses' => 'WatermarkController@watermark_image'));
//Mailing list-----------------------------------------------
Route::get('mailinglist', array(
    'as' => 'mailinglist',
    'uses' => 'localController@mailinglist'
));
Route::post('mailinglist/maillistsubmit', array(
    'as' => 'mailinglist/maillistsubmit',
    'uses' => 'localController@maillistsubmit'));
//URL shortner------------------------------------------------
Route::get('/UrlShorten', 'UrlController@index');
Route::post('/shorten', 'UrlController@shorten');
//EmailPiping----------------------------------------------------
Route::get('/emailpiping', 'EmailPipingController@index');
Route::get('/emails', array(
    'as' => 'Emailpiping',
    'uses' => 'EmailPipingController@emailPiping'
));
//Dynamic rss------------------------------------------------------
Route::get('/dynamicrss', 'DynamicRssController@index');
//LikeButton -------------------------------------------------------
Route::get('LikeButton', array(
    'as' => 'LikeButton',
    'uses' => 'LikeController@index'));
Route::post('like_add', array('as' => 'like_add', 'uses' => 'LikeController@like_add'));
Route::post('like_get', array('as' => 'like_get', 'uses' => 'LikeController@like_get'));

//mini shopping cart

Route::get('minishoppingcart', array(
    'as' => 'minishoppingcart',
    'uses' => 'likebuttonController@shoppingcart'
));
Route::post('addtocart', array(
    'as' => 'addtocart',
    'uses' => 'likebuttonController@addcart'
));
Route::post('checkcart', 'likebuttonController@checkcart');
Route::post('checkout', array(
    'as' => 'checkout',
    'uses' => 'likebuttonController@checkout'
));
Route::get('incrementproduct/{id}', array(
    'as' => 'incrementproduct',
    'uses' => 'likebuttonController@addproduct'
));

Route::get('decrementproduct/{id}', array(
    'as' => 'decrementproduct',
    'uses' => 'likebuttonController@deductproduct'
));
Route::get('deleteproduct/{id}', array(
    'as' => 'deleteproduct',
    'uses' => 'likebuttonController@deleteproduct'
));
Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'likebuttonController@payment'
));
Route::post('paid', array(
    'as' => 'paid',
    'uses' => 'likebuttonController@paid'
));

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//php expert string functions--------------------------------
Route::get('/stringfunctions', 'PhpExpertStringController@index');
Route::get('/stringfunctions12', 'PhpExpertStringController@NameLength');
Route::get('/explode', 'PhpExpertStringController@explode');
Route::get('/implode', 'PhpExpertStringController@implode');
Route::get('/join', 'PhpExpertStringController@join');
Route::get('/substrcount', 'PhpExpertStringController@substr_count');
Route::get('/substrreplace', 'PhpExpertStringController@substr_replace');
Route::get('/datetotime', 'PhpExpertStringController@datetotime');
Route::get('/crawl', 'PhpExpertStringController@crawled');

//bbcode---------------------------------------------------------
Route::get('/bbcode', 'BbController@index');
//oops routes----------------------------------------------------
Route::get('/classfile', 'classfilecontroller@index');
Route::get('/encapsulation', 'encapsulationcontroller@index');
Route::get('/calci', 'calculatorcontroller@index');
Route::get('/constructor', 'constructorcontroller@index');
Route::get('/method', 'methodcontroller@index');
Route::get('/inherit', 'inheritancecontroller@index');
Route::get('/scope', 'scopecontroller@index');
Route::get('/constant', 'constantcontroller@index');
Route::get('/static', 'staticcontroller@index');
Route::get('/database', 'databasecontroller@index');
Route::get('/dynamic', 'dynamiccontroller@home');



Route::group(array('before' => 'guest'), function() {

    Route::group(array('before' => 'csrf'), function() {
        Route::post('/accounts/create', array(
            'as' => 'accounts-create-post',
            'uses' => 'accountcontroller@postCreate'
        ));
    });
    Route::get('/accounts/create', array(
        'as' => 'accounts-create',
        'uses' => 'accountcontroller@getCreate'
    ));
    Route::get('/accounts/activate/{code}', array(
        'as' => 'accounts-activate',
        'uses' => 'accountcontroller@getActivate'
    ));
});
//about a site development
Route::get('/home', function() {
    return view('Homes');
});
Route::get('/about', function() {
    return view('About');
});
Route::get('/contactus', 'WebDevelopmentController@contacts');
Route::post('/contactus', array(
    'as' => 'Contact',
    'uses' => 'WebDevelopmentController@contact'
));
//Forum management------------------------------------------------------------------------
Route::get('/forum', 'ForumController@home');

Route::get('/register', array(
    'as' => 'register',
    'uses' => 'ForumController@register'
));
Route::get('/forum', 'ForumController@home');
Route::post('/registration', array(
    'as' => 'registersubmit',
    'uses' => 'ForumController@registersubmit'
));

Route::post('/loginsubmit', array(
    'as' => 'loginUser',
    'uses' => 'ForumController@login'
));
Route::any('/welcome', array(
    'as' => 'welcome',
    'uses' => 'ForumController@welcome'
));
Route::get('/myprofile', array(
    'as' => 'profile',
    'uses' => 'ForumController@myprofile'
));
Route::get('/viewprofile', array(
    'as' => 'viewprofile',
    'uses' => 'ForumController@viewprofile'
));

Route::any('/changepassword', array(
    'as' => 'changepassword',
    'uses' => 'ForumController@changePassword'
));
//AdminLte task------------------------------------------------
Route::get('/homepage', array('as' => 'homepages', 'uses' => 'AdminController@home'));
Route::get('/loginpage', array(
    'as' => 'indlogin',
    'uses' => 'AdminController@index'
));
Route::get('/registerpage', array(
    'as' => 'registration',
    'uses' => 'AdminController@register'
));
Route::post('/registerpagestep2', array(
    'as' => 'registration2',
    'uses' => 'AdminController@registerstep'
));
Route::get('/registerpagestep2', array(
    'as' => 'registration2',
    'uses' => 'AdminController@registerstep'
));
Route::post('/registerpagestep3', array(
    'as' => 'registration3',
    'uses' => 'AdminController@registersteps'
));
Route::post('/getvalues', array(
    'as' => 'values',
    'uses' => 'AdminController@getValues'
));
Route::post('/next', array(
    'as' => 'next',
    'uses' => 'AdminController@loginNext'
));
Route::get('/update', array(
    'as' => 'updates',
    'uses' => 'AdminController@update'
));
Route::any('/onupdate', array(
    'as' => 'onupdates',
    'uses' => 'AdminController@onUpdate'
));
Route::get('/updatepassword', array(
    'as' => 'updatepasswords',
    'uses' => 'AdminController@ChangePassword'
));
Route::post('/onupdatepassword', array(
    'as' => 'onupdatepasswords',
    'uses' => 'AdminController@password'
));
Route::get('/logout', array(
    'as' => 'signout',
    'uses' => 'AdminController@logout'
));
Route::get('/maps', array(
    'as' => 'maps',
    'uses' => 'AdminController@maps'
));
Route::get('/FileUpload', array(
    'as' => 'FileUpload',
    'uses' => 'AdminController@FileUpload'
));

Route::post('uploads', array(
    'as' => 'upload',
    'uses' => 'AdminController@upload'
));
Route::get('/getdata', array(
    'as' => 'data',
    'uses' => 'AdminController@getData'
));
Route::get('/passwordview', array(
    'as' => 'forgotpassword',
    'uses' => 'AdminController@forgotPasswordView'
));
Route::post('/password', array(
    'as' => 'forgot',
    'uses' => 'AdminController@forgotPassword'
));
Route::get('/view', array(
    'as' => 'viewprofile',
    'uses' => 'AdminController@viewProfile'
));
Route::get('/timezone', array(
    'as' => 'timezone',
    'uses' => 'AdminController@timeZone'
));
Route::get('/dataTimeZone/{data}', array(
    'as' => 'dataTimeZone',
    'uses' => 'AdminController@dataTimeZone'
));

Route::get('/dataTimeZoneDelete/{data}', array(
    'as' => 'dataTimeZoneDelete',
    'uses' => 'AdminController@dataTimeZoneDelete'
));
Route::post('/SaveRows', array(
    'as' => 'SaveRows',
    'uses' => 'AdminController@SaveRows'
));
Route::get('/ViewdataTimeZone/{data}', array(
    'as' => 'ViewdataTimeZone',
    'uses' => 'AdminController@ViewdataTimeZone'
));


Route::get('/ontimezone', array(
    'as' => 'onzone',
    'uses' => 'AdminController@onTimeZone'
));
Route::get('/Adminexcel', array(
    'as' => 'format',
    'uses' => 'AdminController@excelFormatAdminLte'
));
Route::get('/logexcel', array(
    'as' => 'logformat',
    'uses' => 'AdminController@excelFormatLogs'
));
Route::get('/timeexcel', array(
    'as' => 'timeformat',
    'uses' => 'AdminController@excelFormatTimeZone'
));
Route::get('/uploadexcel', array(
    'as' => 'uploadformat',
    'uses' => 'AdminController@excelFormatUpload'
));
Route::get('/adminpdf', array(
    'as' => 'pdfformat',
    'uses' => 'AdminController@pdfFormatAdminLte'
));
Route::get('/logspdf', array(
    'as' => 'logpdf',
    'uses' => 'AdminController@pdfFormatLogs'
));
Route::get('/uploadpdf', array(
    'as' => 'uploadspdf',
    'uses' => 'AdminController@pdfFormatUploads'
));
Route::get('/zones', array(
    'as' => 'timepdf',
    'uses' => 'AdminController@pdfFormatTime'
));

//FACEBOOK ROUTE----------------------------------------
Route::get('/facebook', array('as' => 'face', 'uses' => 'AdminController@redirectToProvider'
));
Route::get('/facebook/callback', array('as' => 'book', 'uses' => 'AdminController@handleProviderCallback'
));
Route::get('/redirectdashboard', array(
    'as' => 'dashboard',
    'uses' => 'AdminController@redirectDashBoard'
));
//GOOGLE+----------------------------------------------
Route::get('/google', array('as' => 'googlepage', 'uses' => 'AdminController@google'
));
Route::get('/google/callback', array('as' => 'google/callback', 'uses' => 'AdminController@googleCallback'
));
Route::get('/dashboard', array(
    'as' => 'dashboard',
    'uses' => 'AdminController@redirectgoogleDashBoard'
));
//LINKEDIN-------------------------------------------------
Route::get('/linkedin', array('as' => 'linkedinpage', 'uses' => 'AdminController@linkedin'
));
Route::get('/linkedin/callback', array('as' => 'linkedin/callback', 'uses' => 'AdminController@linkedinCallback'
));
Route::get('ajaxcall', array(
    'as' => 'ajaxcall',
    'uses' => 'AdminController@ajaxcall'
));
Route::get('/relation', array(
    'as' => 'relation',
    'uses' => 'AdminController@hasValue'
));
/*use App\User;
Route::get('User',function(){ 
    
   $user=User::find(1);
   echo "<pre>";
   print_r($user);
   
});*/
/*Route::get('config/mail', function(){
    Mail::send('resources/views/test', array("name" => "lakshmi"), function($message) {
            $message->to('lprasanna537@gmail.com', 'lakshmi')->subject('testemail');
        });

});


