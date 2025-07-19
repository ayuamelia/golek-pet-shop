<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\RestrictAccess;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petshop;
use App\Pet;
use App\Reservation;
use App\User;
use Auth;
use App\ReservationModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AdminPetshopsController extends Controller
{
    //display all petshop

    public function index() {
        $petshops = Petshop::orderBy('created_at', 'desc')->paginate(6);

        return view("admin.displayPetshops",['petshops'=>$petshops]);

    }

    public function dashboardAdmin(){
        $petshops = Petshop::all();
        $petshopCount = count($petshops);

        $user = User::all();
        $userCount = count($user);

        $reservation = ReservationModel::all();
        $reservationCount = count($reservation);

        $pet = Pet::all();
        $petCount = count($pet);

        $waiting = ReservationModel::where('status','waiting')->get();
        $waitingCount = count($waiting);

        $appoved = ReservationModel::where('status','approved')->get();
        $approvedCount = count($appoved);

        $rejected = ReservationModel::where('status','rejected')->get();
        $rejectedCount = count($rejected);

        //dd($waitingCount);
        return view('admin.dashboardAdmin')
            ->with('petshopCount', $petshopCount)
            ->with('userCount', $userCount)
            ->with('reservationCount', $reservationCount)
            ->with('petCount', $petCount)
            ->with('waitingCount', $waitingCount)
            ->with('approvedCount', $approvedCount)
            ->with('rejectedCount', $rejectedCount);
        return view("admin.dashboardAdmin",['petshopCount'=>$petshops]);
    }

    public function adminDisplayUsers() {
        $users = User::orderBy('created_at', 'desc')->get();

        return view("admin.displayUsers",['users'=>$users]);

    }

    public function adminDisplayPets() {
        $pets = Pet::orderBy('created_at', 'desc')->get();

        return view("admin.displayPets",['pets'=>$pets]);

    }

    public function adminDisplayReservations() {
        $reservation = ReservationModel::orderBy('submit_date', 'desc')->get();

        return view("admin.displayReservations",['reservations'=>$reservation]);

    }

    public function reportPetshop(){
        $petshop = Pet::all();
        return view("admin.reportPetshopFilter",['petshop'=>$petshop]);
    }

    public function reportPetshopData(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $search_key = $request->input('search_key');


        if(isset($start_date) and  isset($end_date) and isset($search_key)){
            $petshopData = Petshop::whereBetween('updated_at', [$start_date, $end_date])
                ->where( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'address', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'sub_district', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'city', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'province', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $petshopDataCount = count($petshopData);
            //dd($petshopData);
            return view("admin.reportPetshopData")->with('petshop', $petshopData)->with('petshopCount', $petshopDataCount);
        }elseif (isset($start_date) and isset($end_date) and is_null($search_key)) {
            $petshopData = Petshop::whereBetween('updated_at', [$start_date, $end_date])->get();
            $petshopDataCount = count($petshopData);
            //dd($petshopData);
            return view("admin.reportPetshopData")->with('petshop', $petshopData)->with('petshopCount', $petshopDataCount);
        }elseif (is_null($start_date) and is_null($end_date) and isset($search_key)){
            $petshopData = Petshop::where ( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'address', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'sub_district', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'city', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'province', 'LIKE', '%' . $search_key . '%' )
                ->get ();
            $petshopDataCount = count($petshopData);
            return view("admin.reportPetshopData")->with('petshop', $petshopData)->with('petshopCount', $petshopDataCount);
        }elseif(is_null($start_date) and is_null($end_date) and is_null($search_key)){
            return redirect()->route("adminReportPetshop")->withfailed("Please input report filter");
        }
}

    public function reportUser(){
        $user = User::all();
        return view("admin.reportUserFilter",['user'=>$user]);
    }

    public function reportUserData(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $search_key = $request->input('search_key');


        if(isset($start_date) and  isset($end_date) and isset($search_key)){
            $userData = User::whereBetween('updated_at', [$start_date, $end_date])
                ->where( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'petshop_id', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'email', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'phone', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $userDataCount = count($userData);
            //dd($userData);
            return view("admin.reportUserData")->with('user', $userData)->with('userCount', $userDataCount);
        }elseif (isset($start_date) and isset($end_date) and is_null($search_key)) {
            $userData = User::whereBetween('updated_at', [$start_date, $end_date])->get();
            $userDataCount = count($userData);
            //dd($petshopData);
            return view("admin.reportUserData")->with('user', $userData)->with('userCount', $userDataCount);
        }elseif (is_null($start_date) and is_null($end_date) and isset($search_key)){
            $userData = User::where ( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'petshop_id', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'email', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'phone', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $userDataCount = count($userData);
            return view("admin.reportUserData")->with('user', $userData)->with('userCount', $userDataCount);
        }elseif(is_null($start_date) and is_null($end_date) and is_null($search_key)){
            return redirect()->route("adminReportUser")->withfailed("Please input report filter");
        }
    }

    public function reportPet(){
        $pet = Pet::all();
        return view("admin.reportPetFilter",['pet'=>$pet]);
    }

    public function reportPetData(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $search_key = $request->input('search_key');


        if(isset($start_date) and  isset($end_date) and isset($search_key)){
            $petData = Pet::whereBetween('updated_at', [$start_date, $end_date])
                ->where( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'user_id', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'age', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $petDataCount = count($petData);
            return view("admin.reportPetData")->with('pet', $petData)->with('petCount', $petDataCount);
        }elseif (isset($start_date) and isset($end_date) and is_null($search_key)) {
            $petData = Pet::whereBetween('updated_at', [$start_date, $end_date])->get();
            $petDataCount = count($petData);
            return view("admin.reportPetData")->with('pet', $petData)->with('petCount', $petDataCount);
        }elseif (is_null($start_date) and is_null($end_date) and isset($search_key)){
            $petData = Pet::where ( 'name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'user_id', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'age', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $petDataCount = count($petData);
            //dd($petData);
            return view("admin.reportPetData")->with('pet', $petData)->with('petCount', $petDataCount);
        }elseif(is_null($start_date) and is_null($end_date) and is_null($search_key)){
            return redirect()->route("adminReportPet")->withfailed("Please input report filter");
        }
    }

    public function reportReservation(){
        $reservation = ReservationModel::all();
        return view("admin.reportReservationFilter",['reservation'=>$reservation]);
    }

    public function reportReservationData(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $search_key = $request->input('search_key');


        if(isset($start_date) and  isset($end_date) and isset($search_key)){
            $reservationData = ReservationModel::orderBy('created_at', 'desc')
                ->whereBetween('booking_date', [$start_date, $end_date])
                ->where( 'status', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'petshop_name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'selected_service', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'pet_type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'price', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'note', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $reservationDataCount = count($reservationData);
            return view("admin.reportReservationData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif (isset($start_date) and isset($end_date) and is_null($search_key)) {
            $reservationData = ReservationModel::whereBetween('booking_date', [$start_date, $end_date])->get();
            $reservationDataCount = count($reservationData);
            return view("admin.reportReservationData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif (is_null($start_date) and is_null($end_date) and isset($search_key)){
            $reservationData = ReservationModel::orderBy('created_at', 'desc')
                ->where ( 'status', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'petshop_name', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'selected_service', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'pet_type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'price', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'note', 'LIKE', '%' . $search_key . '%' )
                ->get();
            $reservationDataCount = count($reservationData);
            //dd($petData);
            return view("admin.reportReservationData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif(is_null($start_date) and is_null($end_date) and is_null($search_key)){
            return redirect()->route("adminReportReservation")->withfailed("Please input report filter");
        }
    }

    //aaaa
    //create new petshop
    public function createUserForm(){
        return view("admin.createUserForm");

    }

    //store new petshop to DB
    public function sendNewUserForm(Request $request){
        $type = $request->input('type');
        $petshop_id = $request->input('petshop_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $date = date('Y-m-d H:i:s');


        if($type == "Customer"){
            $adminType = 0;
        }elseif ($type == "Admin Petshop"){
            $adminType = 1;
        }else{
            $adminType = 1;
        }
        //dd($adminType);

        $newUserArray = array("petshop_id"=>$petshop_id, "type"=>$adminType, "name"=>$name, "email"=>$email, "phone"=>$phone, 'password' => Hash::make($password),"created_at"=>$date, "updated_at"=>$date);
        $created = DB::table("users")->insert($newUserArray);

        if ($created){
            return redirect()->route("adminDisplayUsers")->withsuccess("User {$name}} has ben created");
        }else{
            return "New Petshop was not created";
        }
    }



    //create new petshop
    public function createPetshopForm(){
        return view("admin.createPetshopForm");

    }

    //store new petshop to DB
    public function sendNewPetshopForm(Request $request){
        $name = $request->input('name');
        $address = $request->input('address');
        $sub_district = $request->input('sub_district');
        $city = $request->input('city');
        $province = $request->input('province');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $phone = $request->input('phone');
        $doctor = $request->input('doctor');
        $doctor_price = $request->input('doctor_price');
        $grooming = $request->input('grooming');
        $grooming_price = $request->input('grooming_price');
        $hotel = $request->input('hotel');
        $hotel_price = $request->input('hotel_price');
        $date = date('Y-m-d H:i:s');

        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,jpeg,png|max:1000"])->validate();
        $ext = $request->file('image')->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ","",$request->input('name'));

        $imageName = $stringImageReFormat.".".$ext;

        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/petshop_images/'.$imageName, $imageEncoded);

        $newPetshopArray = array("name"=>$name, "image"=>$imageName , "address"=>$address, "sub_district"=>$sub_district, "city"=>$city, "province"=>$province,
            "open_time"=>$open_time, "close_time"=>$close_time, "phone"=>$phone, "doctor"=>$doctor, "doctor_price"=>$doctor_price,
            "grooming"=>$grooming, "grooming_price"=>$grooming_price, "hotel"=>$hotel, "hotel_price"=>$hotel_price, "created_at"=>$date, "updated_at"=>$date);
        $created = DB::table("petshops")->insert($newPetshopArray);

        if ($created){
            return redirect()->route("adminDisplayPetshops");
        }else{
            return "New Petshop was not created";
        }
    }

    //display edit petshop form
    public function editPetshopForm($id){
        $petshop = Petshop::find($id);
        return view("admin.editPetshopForm",['petshop'=>$petshop]);
    }

    //display edit petshop image form
    public function editPetshopImageForm($id){
        $petshop = Petshop::find($id);
        return view("admin.editPetshopImageForm",['petshop'=>$petshop]);

    }

    //display edit user form
    public function editUserForm($id){
        $user = User::find($id);
        return view("admin.editUserForm",['user'=>$user]);
    }

    //update petshop image
    public function updatePetshopImage(Request $request,$id){
        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,jpeg,png|max:1000"])->validate();

        if ($request->hasFile("image")) {
            $petshop = Petshop::find($id);
            $exists = Storage::disk('local')->exists("public/petshop_images/".$petshop->image);
            $date = date('Y-m-d H:i:s');

            //delete old image
            if ($exists) {
                Storage::delete('public/petshop_images/'.$petshop->image);
            }

            //upload new image
            $ext = $request->file('image')->getClientOriginalExtension();

            $request->image->storeAs("public/petshop_images/",$petshop->image);

            $arrayToUpdate = array('image'=>$petshop->image, "updated_at"=>$date);
            DB::table('petshops')->where('id',$id)->update($arrayToUpdate);

            return redirect()->route("adminDisplayPetshops");
        }else{
            $error = "No image was selected";
            return $error;
        }

    }

    public function updatePetshop(Request $request,$id){
        $name = $request->input('name');
        $address = $request->input('address');
        $sub_district = $request->input('sub_district');
        $city = $request->input('city');
        $province = $request->input('province');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $phone = $request->input('phone');
        $doctor = $request->input('doctor');
        $doctor_price = $request->input('doctor_price');
        $grooming = $request->input('grooming');
        $grooming_price = $request->input('grooming_price');
        $hotel = $request->input('hotel');
        $hotel_price = $request->input('hotel_price');
        $date = date('Y-m-d H:i:s');


        //dump($name);

        $arrayToUpdate = array("name"=>$name, "address"=>$address, "sub_district"=>$sub_district, "city"=>$city, "province"=>$province,
            "open_time"=>$open_time, "close_time"=>$close_time, "phone"=>$phone, "doctor"=>$doctor, "doctor_price"=>$doctor_price,
            "grooming"=>$grooming, "grooming_price"=>$grooming_price, "hotel"=>$hotel, "hotel_price"=>$hotel_price, "updated_at"=>$date);
        DB::table('petshops')->where('id',$id)->update($arrayToUpdate);

        return redirect()->route("adminDisplayPetshops");


    }

    //delete petshop
    public function deletePetshop($id){
        $petshop = Petshop::find($id);

        $exists = Storage::disk('local')->exists("public/petshop_images/".$petshop->image);

        //delete image
        if ($exists) {
            Storage::delete('public/petshop_images/'.$petshop->image);
        }

        Petshop::destroy($id);

        return redirect()->route("adminDisplayPetshops");
    }


    //Admin Petshop

    public function petshopData() {
        $petshop_id = Auth::user()->petshop_id;
        $petshops = Petshop::where( 'id', $petshop_id )->get ();

        return view("admin.petshopDisplayData",['petshops'=>$petshops]);

    }
    public function reservationData() {
        $petshop_id = Auth::user()->petshop_id;
        $reservation = ReservationModel::where( 'petshop_id', $petshop_id )->orderBy('submit_date', 'desc')->get ();

        //$reservation = DB::table('reservations')
        //    ->join('users', 'reservations.user_id' , '=' , 'users.id')
        //->where('reservations.petshop_id' ,'=', $petshop_id)
        //    ->get(array(
        //        'name',
        //        'submit_date',
        //        'reserve_date',
        //        'status',
        //        'approval_date',
        //        'selected_service',
        //        'pet_quantity',
        //        'price'
        //    ));

        //dd($reservation);

        return view("admin.petshopDisplayReservation",['reservations'=>$reservation]);
        //return view("admin.petshopDisplayReservation", compact('reservation'));

    }

    public function detailReservationData($id) {
        $reservation = ReservationModel::find($id);
        $user_id = $reservation->user_id;
        $user = User::where( 'id', $user_id )->get();


        //dd($user[0]['name']);
        //dd($reservation->selected_service);
        //return view('admin.detailReservationData', ['detailReservation'=>$reservation, 'users'=>$user]);
        return view('admin.detailReservationData')->with('detailReservation', $reservation)->with('users', $user);
    }

    public static function checkID($value){
        $id = $value;
        User::where( 'id', 'LIKE', '%' . $id . '%' )->get ();
    }

    public function adminAction(Request $request, $id){
        $action = $request->input('action');
        $note = $request->input('note');
        $date = date('Y-m-d H:i:s');
        $reservation_id = ReservationModel::find($id);
        $reservationID = $reservation_id->id;
        $petshop_id = $reservation_id->petshop_id;
        $user_id = $reservation_id->user_id;
        $id = $reservation_id->id;

        //petshop data
        $petshopData = Petshop::where('id',$petshop_id)->get();
        $petshopName = $reservation_id->petshop_name;
        $petshopAddress = $petshopData[0]['address'];
        $petshopDistrict = $petshopData[0]['sub_district'];
        $petshopCity = $petshopData[0]['city'];
        $petshopPhone = $petshopData[0]['phone'];

        //reservation data
        $bookingDate = $reservation_id->booking_date;
        $service = $reservation_id->selected_service;
        $petType = $reservation_id->pet_type;
        $petQuantity = $reservation_id->pet_quantity;
        $price = $reservation_id->price;
        //$bookingStatus = $reservation_id->status;
        //$bookingNote = $reservation_id->note;


        //customer data
        $user = User::where( 'id', $user_id )->get();
        $customerName = $user[0]['name'];
        $customerEmail = $user[0]['email'];
        $customerPhone = $user[0]['phone'];


        $arrayToUpdate = array("status"=>$action, "updated_at"=>$date, "note"=>$note);
        DB::table('reservations')->where('id',$id)->update($arrayToUpdate);

        $newReservation = ReservationModel::where( 'id', $reservationID )->get();
        $bookingStatus = $newReservation[0]['status'];
        $bookingNote = $newReservation[0]['note'];
        //dd($bookingStatus);

        $dataToCustomer = array(
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'petshopName' => $petshopName,
            'petshopAddress' => $petshopAddress,
            'petshopDistrict' => $petshopDistrict,
            'petshopCity' => $petshopCity,
            'petshopPhone' => $petshopPhone,
            'bookingDate' => $bookingDate,
            'service' => ucfirst($service),
            'petType' => $petType,
            'petQuantity' => $petQuantity,
            'price' => $price,
            'bookingStatus' => $bookingStatus,
            'bookingNote' => $bookingNote

        );
        //dd($dataToCustomer);

        Mail::to($customerEmail)->send(new SendMailToCustomer($dataToCustomer));

        return redirect()->route("reservationData");


    }

    public function reportReservationPetshop(){
        $reservation = ReservationModel::all();
        return view("admin.petshopReportFilter",['reservation'=>$reservation]);
    }

    public function reportReservationDataPetshop(Request $request){
        $petshop_id = Auth::user()->petshop_id;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $search_key = $request->input('search_key');



        if(isset($start_date) and  isset($end_date) and isset($search_key)){
            $reservationData = ReservationModel::whereBetween('booking_date', [$start_date, $end_date])
                ->where( 'petshop_id', $petshop_id )
                ->where( 'status', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'selected_service', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'pet_type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'price', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'note', 'LIKE', '%' . $search_key . '%' )
                ->orderBy('booking_date', 'desc')
                ->get();
            $reservationDataCount = count($reservationData);
            return view("admin.petshopReportData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif (isset($start_date) and isset($end_date) and is_null($search_key)) {
            $reservationData = ReservationModel::whereBetween('booking_date', [$start_date, $end_date])->orderBy('booking_date', 'desc')->get();
            $reservationDataCount = count($reservationData);
            return view("admin.petshopReportData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif (is_null($start_date) and is_null($end_date) and isset($search_key)){
            $reservationData = ReservationModel::where ( 'status', 'LIKE', '%' . $search_key . '%' )
                ->where( 'petshop_id', $petshop_id )
                ->orWhere( 'selected_service', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'pet_type', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'price', 'LIKE', '%' . $search_key . '%' )
                ->orWhere( 'note', 'LIKE', '%' . $search_key . '%' )
                ->orderBy('booking_date', 'desc')
                ->get();
            $reservationDataCount = count($reservationData);
            //dd($petData);
            return view("admin.petshopReportData")->with('reservation', $reservationData)->with('reservationCount', $reservationDataCount);
        }elseif(is_null($start_date) and is_null($end_date) and is_null($search_key)){
            return redirect()->route("adminReportReservationPetshop")->withfailed("Please input report filter");
        }
    }

    public function petshopTotalApproved(Request $request)
    {
        $petshop_id = Auth::user()->petshop_id;

        $reservationData = ReservationModel::where('petshop_id', $petshop_id)
            ->where('status', "approved")
            ->orderBy('booking_date', 'desc')
            ->get();
        return view("admin.petshopTotalApproved")->with('reservation', $reservationData);
    }

    public function petshopTotalRejected(Request $request)
    {
        $petshop_id = Auth::user()->petshop_id;

        $reservationData = ReservationModel::where('petshop_id', $petshop_id)
            ->where('status', "rejected")
            ->orderBy('booking_date', 'desc')
            ->get();
        return view("admin.petshopTotalRejected")->with('reservation', $reservationData);
    }

    public function petshopTotalWaiting(Request $request)
    {
        $petshop_id = Auth::user()->petshop_id;

        $reservationData = ReservationModel::where('petshop_id', $petshop_id)
            ->where('status', "waiting")
            ->orderBy('booking_date', 'desc')
            ->get();
        $petshopTotalWaitingCount = count($reservationData);
        return view("admin.petshopTotalWaiting")->with('reservation', $reservationData)->with('petshopTotalWaiting', $petshopTotalWaitingCount);
    }


}
