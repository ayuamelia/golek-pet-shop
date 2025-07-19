<?php

use App\Petshop;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Mail\ConfirmReservationAdmin;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('login', ['as' => 'login', function () {
    return view('login');
}]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('result', function () {
    return view('dashboard');
});

Route::get('about', function () {
    return view('about');
});

Route::get('faq', function () {
    return view('footer.faq');
});

Route::get('allpetshop',  ['as' => 'allpetshop', function () {
    $q = 'yes';
    $search = Petshop::where ( 'doctor', 'LIKE', '%' . $q . '%' )->orWhere( 'grooming', 'LIKE', '%' . $q . '%' )->orWhere( 'hotel', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('allpetshop')->withDetails($search)->withQuery ( $q );
}]);

Route::get('allservices', ['as' => 'allservices', function () {
    $q = 'yes';
    $search = Petshop::where ( 'doctor', 'LIKE', '%' . $q . '%' )->orWhere( 'grooming', 'LIKE', '%' . $q . '%' )->orWhere( 'hotel', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('allservices')->withDetails($search)->withQuery ( $q );
}]);

Route::get('grooming', ['as' => 'grooming', function () {
    $q = 'yes';
    $search = Petshop::where ( 'grooming', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('grooming')->withDetails($search)->withQuery ( $q );
}]);

Route::get('doctor', ['as' => 'doctor', function () {
    $q = 'yes';
    $search = Petshop::where ( 'doctor', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('doctor')->withDetails($search)->withQuery ( $q );
}]);

Route::get('hotel', ['as' => 'hotel', function () {
    $q = 'yes';
    $search = Petshop::where ( 'hotel', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('hotel')->withDetails($search)->withQuery ( $q );
}]);

//find petshop
Route::get('find', ['as' => 'find', function (Request $request) {
    $q = $request->get('findText');
    //$q = Input::get ( 'q' );
    $search = Petshop::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'address', 'LIKE', '%' . $q . '%' )->orWhere ( 'sub_district', 'LIKE', '%' . $q . '%' )->orWhere ( 'province', 'LIKE', '%' . $q . '%' )->paginate(6);
    if ($search)
        return view('allpetshop')->withDetails($search)->withQuery ( $q );
}]);

//advanced search
Route::get('advancedAllServices', ['as' => 'advancedAll', function (Request $request) {
    $q = $request->get('allservices');
    //$q = Input::get ( 'q' );
    $y = 'yes';
    $search = Petshop::where ( 'doctor', 'LIKE', '%' . $y . '%' )->orWhere( 'grooming', 'LIKE', '%' . $y . '%' )->orWhere( 'hotel', 'LIKE', '%' . $y . '%' )->paginate(6);
    if ($search)
        return view('allpetshop')->withDetails($search)->withQuery ( $y );
}]);

Route::get('advancedGrooming', ['as' => 'advancedGrooming', function (Request $request) {
    $q = $request->get('grooming');
    //$q = Input::get ( 'q' );
    $y = 'yes';
    $search = Petshop::where ( 'grooming', 'LIKE', '%' . $y . '%' )->paginate(6);
    if ($search)
        return view('allpetshop')->withDetails($search)->withQuery ( $y );
}]);

Route::get('advancedHotel', ['as' => 'advancedHotel', function (Request $request) {
    $q = $request->get('hotel');
    //$q = Input::get ( 'q' );
    $y = 'yes';
    $search = Petshop::where ( 'hotel', 'LIKE', '%' . $y . '%' )->paginate(6);
    if ($search)
        //dd($y);
        return view('allpetshop')->withDetails($search)->withQuery ( $y );
}]);

Route::get('advancedDoctor', ['as' => 'advancedDoctor', function (Request $request) {
    $q = $request->get('doctor');
    //$q = Input::get ( 'q' );
    $y = 'yes';
    $search = Petshop::where ( 'doctor', 'LIKE', '%' . $y . '%' )->paginate(6);
    if ($search)
        return view('allpetshop')->withDetails($search)->withQuery ( $y );
}]);




//Route::get('details', function () {
    //return view('details');
//});

//welcome page with search function
Route::any( 'searchResult', ['as' => 'searchResult', function (Request $request) {
    $q = $request->get('searchText');
    $search = Petshop::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'address', 'LIKE', '%' . $q . '%' )->orWhere ( 'province', 'LIKE', '%' . $q . '%' )->paginate(6);
    $all = Petshop::paginate(6);
    if (count ( $search ) > 0)
        return view('allpetshop')->withDetails($search)->withQuery ( $q );
    else return view ('allpetshop')->withDetails($all);
}]);

Route::get('dashboard', ["uses"=>"PetshopsController@index", 'as'=> 'dashboard']);


//link for more details
Route::get('petshop/details/{id}',['uses'=> 'PetshopsController@showDetails', 'as'=>'showDetails']);

//show reservation page
Route::get('details', ["uses"=> "PetshopsController@showDetails",'as'=> "detailspage"]);

//redirect link with id to make reservation proces
Route::get('petshop/reservation/{id}',['uses'=> 'PetshopsController@makeReservation', 'as'=>'MakeReservationPetshop']);

//show reservation page
Route::get('reservation', ["uses"=> "PetshopsController@showReservation",'as'=> "reservationPage"]);

//delete reservation
Route::get('petshop/cancelReservation/',['uses'=> 'PetshopsController@cancelReservation', 'as'=>'cancelReservation']);

//create reservation
Route::get('petshop/createReservation/{id}', ['uses'=>'PetshopsController@createReservation', 'as'=>'createReservation']);

//select petshop
Route::post('petshop/selectPetshop/{id}', 'PetshopsController@selectPetshop');


//clear
Route::get('petshop/clear/{id}',['uses'=> 'PetshopsController@clear', 'as'=>'clear']);



//increase quantity
Route::get('petshop/increaseQuantity/{id}',['uses'=> 'PetshopsController@increaseQuantity', 'as'=>'increaseQuantity']);

//decrease quantity
Route::get('petshop/decreaseQuantity/{id}',['uses'=> 'PetshopsController@decreaseQuantity', 'as'=>'decreaseQuantity']);


//User Authentication
Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');

//edit user profile
Route::get('editProfile/{id}', ["uses"=>"HomeController@editProfile", "as"=>"editProfile"]);
Route::post('updateProfile/{id}', ["uses"=>"HomeController@updateProfile", "as"=>"updateProfile"]);

Route::get('addPet/{id}', ["uses"=>"HomeController@addPet", "as"=>"addPet"]);

//send new pet data to DB
Route::post('sendNewPet/{id}', ["uses"=>"HomeController@sendNewPet", "as"=>"sendNewPet"]);

//show history
Route::get('/profile/history/{id}', ["uses"=>"HomeController@profileHistory", "as"=>"profileHistory"]);


//Super Admin Panel
Route::get('admin/dashboard', ["uses"=>"Admin\AdminPetshopsController@dashboardAdmin", "as"=>"dashboardAdmin"])->middleware('restrictToAdmin');

//MODUL PETSHOP
Route::get('admin/petshops', ["uses"=>"Admin\AdminPetshopsController@index", "as"=>"adminDisplayPetshops"])->middleware('restrictToAdmin');
//display edit petshop data form
Route::get('admin/editPetshopData/{id}', ["uses"=>"Admin\AdminPetshopsController@editPetshopForm", "as"=>"adminEditPetshopForm"])->middleware('restrictToAdmin');

//display edit petshop image form
Route::get('admin/editPetshopImage/{id}', ["uses"=>"Admin\AdminPetshopsController@editPetshopImageForm", "as"=>"adminEditPetshopImageForm"])->middleware('restrictToAdmin');

//update petshop image
Route::post('admin/updatePetshopImage/{id}', ["uses"=>"Admin\AdminPetshopsController@updatePetshopImage", "as"=>"adminUpdatePetshopImage"])->middleware('restrictToAdmin');

//update petshop data
Route::post('admin/updatePetshop/{id}', ["uses"=>"Admin\AdminPetshopsController@updatePetshop", "as"=>"adminUpdatePetshop"])->middleware('restrictToAdmin');

//display create petshop  form
Route::get('admin/createPetshopForm', ["uses"=>"Admin\AdminPetshopsController@createPetshopForm", "as"=>"adminCreatePetshopForm"])->middleware('restrictToAdmin');

//send new petshop data to DB
Route::post('admin/sendNewPetshopForm', ["uses"=>"Admin\AdminPetshopsController@sendNewPetshopForm", "as"=>"adminSendNewPetshopForm"])->middleware('restrictToAdmin');

//display edit petshop image form
Route::get('admin/editUser/{id}', ["uses"=>"Admin\AdminPetshopsController@editUserForm", "as"=>"adminEditUserForm"])->middleware('restrictToAdmin');

//update petshop image
Route::post('admin/updateUserData/{id}', ["uses"=>"Admin\AdminPetshopsController@updateUserData", "as"=>"adminUpdateUserData"])->middleware('restrictToAdmin');


//delete petshop
Route::get('admin/deletePetshop/{id}', ["uses"=>"Admin\AdminPetshopsController@deletePetshop", "as"=>"adminDeletePetshop"])->middleware('restrictToAdmin');

//MODUL USER
Route::get('admin/users', ["uses"=>"Admin\AdminPetshopsController@adminDisplayUsers", "as"=>"adminDisplayUsers"])->middleware('restrictToAdmin');

//display create user  form
Route::get('admin/createUserForm', ["uses"=>"Admin\AdminPetshopsController@createUserForm", "as"=>"adminCreateUserForm"])->middleware('restrictToAdmin');

//send new user data to DB
Route::post('admin/sendNewUserForm', ["uses"=>"Admin\AdminPetshopsController@sendNewUserForm", "as"=>"adminSendNewUserForm"])->middleware('restrictToAdmin');


//MODUL PET
Route::get('admin/pets', ["uses"=>"Admin\AdminPetshopsController@adminDisplayPets", "as"=>"adminDisplayPets"])->middleware('restrictToAdmin');


//MODUL RESERVATION
Route::get('admin/reservations', ["uses"=>"Admin\AdminPetshopsController@adminDisplayReservations", "as"=>"adminDisplayReservations"])->middleware('restrictToAdmin');

//MODUL REPORT

//Petshop
Route::get('admin/reportPetshop', ["uses"=>"Admin\AdminPetshopsController@reportPetshop", "as"=>"adminReportPetshop"])->middleware('restrictToAdmin');
Route::post('admin/reportPetshopData', ["uses"=>"Admin\AdminPetshopsController@reportPetshopData", "as"=>"adminReportPetshopData"])->middleware('restrictToAdmin');

//User
Route::get('admin/reportUser', ["uses"=>"Admin\AdminPetshopsController@reportUser", "as"=>"adminReportUser"])->middleware('restrictToAdmin');
Route::post('admin/reportUserData', ["uses"=>"Admin\AdminPetshopsController@reportUserData", "as"=>"adminReportUserData"])->middleware('restrictToAdmin');

//Pet
Route::get('admin/reportPet', ["uses"=>"Admin\AdminPetshopsController@reportPet", "as"=>"adminReportPet"])->middleware('restrictToAdmin');
Route::post('admin/reportPetData', ["uses"=>"Admin\AdminPetshopsController@reportPetData", "as"=>"adminReportPetData"])->middleware('restrictToAdmin');

//Reservation
Route::get('admin/reportReservation', ["uses"=>"Admin\AdminPetshopsController@reportReservation", "as"=>"adminReportReservation"])->middleware('restrictToAdmin');
Route::post('admin/reportReservationData', ["uses"=>"Admin\AdminPetshopsController@reportReservationData", "as"=>"adminReportReservationData"])->middleware('restrictToAdmin');




//Admin Petshop Panel

//dashboard

//approved
Route::get('admin/petshopTotalApproved', ["uses"=>"Admin\AdminPetshopsController@petshopTotalApproved", "as"=>"petshopTotalApproved"])->middleware('restrictToAdmin');

//rejected
Route::get('admin/petshopTotalRejected', ["uses"=>"Admin\AdminPetshopsController@petshopTotalRejected", "as"=>"petshopTotalRejected"])->middleware('restrictToAdmin');

//waiting
Route::get('admin/petshopTotalWaiting', ["uses"=>"Admin\AdminPetshopsController@petshopTotalWaiting", "as"=>"petshopTotalWaiting"])->middleware('restrictToAdmin');


Route::get('admin/data', ["uses"=>"Admin\AdminPetshopsController@petshopData", "as"=>"petshopData"])->middleware('restrictToAdmin');

Route::get('admin/reservationData', ["uses"=>"Admin\AdminPetshopsController@reservationData", "as"=>"reservationData"])->middleware('restrictToAdmin');

//detail reservation data
Route::get('admin/detailReservationData/{id}', ["uses"=>"Admin\AdminPetshopsController@detailReservationData", "as"=>"detailReservationData"])->middleware('restrictToAdmin');

//action
Route::post('admin/adminAction/{id}', ["uses"=>"Admin\AdminPetshopsController@adminAction", "as"=>"adminAction"])->middleware('restrictToAdmin');

//report
Route::get('admin/reportReservationPetshop', ["uses"=>"Admin\AdminPetshopsController@reportReservationPetshop", "as"=>"adminReportReservationPetshop"])->middleware('restrictToAdmin');
Route::post('admin/reportReservationDataPetshop', ["uses"=>"Admin\AdminPetshopsController@reportReservationDataPetshop", "as"=>"adminReportReservationDataPetshop"])->middleware('restrictToAdmin');



Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');





