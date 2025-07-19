<?php

namespace App\Http\Controllers;
use App\Pet;
use App\Petshop;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Database\Query\Builder;

class PetshopsController extends Controller
{
    //
    public function index(){
        /*    $petshops = [0=> ["name"=>"Iphone","category"=>"smart phone","price"=>1000],
                        1=> ["name"=>"Galaxy","category"=>"smart phone","price"=>900]];*/

        $petshops = Petshop::paginate(3);

        //$petshops = Petshop::all();

        return view("dashboard",compact("petshops"));
    }



    public function showDetails(Request $request, $id){


        $detail = Petshop::find($id);

        //dd($detail);
        return view('detailspage', ['detailPetshop'=>$detail]);
    }

    public function checkReservation(){
        $reservaton = Session::get('reservation');
        $items = $reservaton['items'];
    }


    public function makeReservation(Request $request, $id)
    {
        $user_id = Auth::id();

        $reservation = Session::get('reservation');

        if($reservation === null) {
            $prevCart = $request->session()->get('reservation');
            $reservation = new Reservation($prevCart);

            $petshop = Petshop::find($id);
            //dump($reservation);
            $reservation->addItem($id, $petshop);
            $request->session()->put('reservation', $reservation);

            //dump($reservation);

            return redirect()->route("reservationPage");
        }else{
            return redirect()->route("reservationPage")->withsuccess("You have made a reservation. Please submit or cancel it, before make other reservation");

        }
    }
    public function showReservation(){
        $reservation = Session::get('reservation');
        $user = Auth::id();
        $pet = Pet::where( 'user_id',  $user )->get (['type']);

        if($reservation){
            //return view('reservationpage', ['reservationItems'=>$reservation]);
            return view('reservationpage')->with('reservationItems', $reservation)->with('pet', $pet);
        }else{
            return redirect()->route("allpetshop");

        }
    }

    public function cancelReservation() {
        Session::forget("reservation");
        return redirect()->route("allpetshop");

    }
    public static function separatePrice($value){
        $myNumber = $value;
        return number_format( $myNumber, 0, ',', '.' );
    }

    public function createReservation(Request $request,$id)
    {
        $reservationItems = $request->session()->get('reservation');
        $petshop = Petshop::find($id);
        $petshop_id = $petshop->id;
        $user_id = Auth::id();
        $searchAdminPetshop = User::where( 'petshop_id', $petshop_id )->get();
        $adminEmail = $searchAdminPetshop[0]['email'];

        //dd($adminEmail);
        $selectedService = $reservationItems->items[$id]['selectedService'];
        $petQuantity = $reservationItems->totalQuantity;
        $totalPrice = $reservationItems->totalPrice;




        $isUserLoggedIn = Auth::check();
        if($isUserLoggedIn){

            //reservation not empty

            if ($reservationItems) {
                $date = date('Y-m-d H:i:s');
                //dump($reservationItems);
                foreach ($reservationItems->items as $item) {

                    $petshop_id = $item['data']['id'];
                    $petshop_name = $item['data']['name'];
                    $booking_date = $item['reserveDate'];
                    $pet = $item['pet'];
                    $newReservationDetailArray = array("user_id"=> $user_id, "submit_date" => $date, "booking_date" => $booking_date, "status" => "waiting", "updated_at" => $date, "petshop_id" => $petshop_id, "petshop_name" => $petshop_name, "selected_service" => $selectedService, "pet_type" => $pet ,"pet_quantity" => $petQuantity, "price" => $totalPrice);
                    $createdReservation = DB::table("reservations")->insert($newReservationDetailArray);

                    $customerName = Auth::user()->name;

                    $data = array(
                        'customerName' => $customerName,
                        'bookingDate' => $booking_date,
                        'selectedService' => ucfirst($selectedService),
                        'petType' => $pet,
                        'petQuantity' => $petQuantity
                    );

                    Mail::to($adminEmail)->send(new SendMail($data));
                    //return back()->with('success', 'Thanks for contacting us!');

                }
                //dd($reservationItems);
                //dump($newReservationDetailArray);m
                //delete cart

                Session::forget("reservation");
                return redirect()->route("allpetshop")->withsuccess("Thank you for your reservation. Please wait until your reservation was accepted");




            } else {
                return redirect()->route("allpetshop");
            }
        } else{
            return redirect()->route("login")->withfailed("Please login before make a reservation!");
        }

    }

    public function selectPetshop(Request $request, $id){
        $prevCart = $request->session()->get('reservation');
        $reservation = new Reservation($prevCart);
        $service = $request->input('selectServices');
        $pet = $request->input('pet');
        $date = date('Y-m-d H:i:s');
        $reserve_date = $request->input('reserve_date');
        $petshop = Petshop::find($id);
        //$customerId = Auth::user()->id;
        //$pet_type = Pet::where("user_id", $customerId)->get();
        //dd($pet);

        if($service == "doctor"){
            if ($reserve_date < $date) {
                return redirect()->route("reservationPage")->withfailed("Please select correct date.");
            }elseif ($pet == null){
                return redirect()->route("reservationPage")->withfailed("Please add pet information before continue to make a reservation.");
            }
            else{
                $reservation->items[$id]['doctorQuantity'] = $reservation->items[$id]['doctorQuantity']+1;
                $reservation->items[$id]['totalPrice'] = $reservation->items[$id]['doctorQuantity'] * $petshop['doctorPrice'];
                $reservation->items[$id]['selectedService'] = $service;
                $reservation->items[$id]['reserveDate'] = $reserve_date;
                $reservation->items[$id]['pet'] = $pet;
                $reservation->addDoctor();
            }

        }elseif ($service == "grooming"){
            if ($reserve_date < $date) {
                return redirect()->route("reservationPage")->withfailed("Please select correct date.");
            }elseif ($pet == null){
                return redirect()->route("reservationPage")->withfailed("Please add pet information before continue to make a reservation.");
            }
            else {
                $reservation->items[$id]['groomingQuantity'] = $reservation->items[$id]['groomingQuantity']+1;
                $reservation->items[$id]['totalPrice'] = $reservation->items[$id]['groomingQuantity'] * $petshop['groomingPrice'];
                $reservation->items[$id]['selectedService'] = $service;
                $reservation->items[$id]['reserveDate'] = $reserve_date;
                $reservation->items[$id]['pet'] = $pet;
                $reservation->addGrooming();
            }
        }else{
            if ($reserve_date < $date) {
                return redirect()->route("reservationPage")->withfailed("Please select correct date.");
            }elseif ($pet == null){
                return redirect()->route("reservationPage")->withfailed("Please add pet information before continue to make a reservation.");
            }else {
                $reservation->items[$id]['hotelQuantity'] = $reservation->items[$id]['hotelQuantity']+1;
                $reservation->items[$id]['totalPrice'] = $reservation->items[$id]['hotelQuantity'] * $petshop['hotelPrice'];
                $reservation->items[$id]['selectedService'] = $service;
                $reservation->items[$id]['reserveDate'] = $reserve_date;
                $reservation->items[$id]['pet'] = $pet;
                $reservation->addHotel();
            }
        }

        $request->session()->put('reservation',$reservation);
        //dd($reservation);
        return redirect()->route("reservationPage");


    }


    public function clear(Request $request,$id){
        $prevCart = $request->session()->get('reservation');
        $reservation = new Reservation($prevCart);

        $petshop = Petshop::find($id);
        $reservation->items[$id]['doctorQuantity'] = 0;
        $reservation->items[$id]['groomingQuantity'] = 0;
        $reservation->items[$id]['hotelQuantity'] = 0;
        $reservation->clear();

        $request->session()->put('reservation',$reservation);


        return redirect()->route("reservationPage");

    }

    public function increaseQuantity(Request $request,$id){
        $prevCart = $request->session()->get('reservation');
        $reservation = new Reservation($prevCart);

        $petshop = Petshop::find($id);
        $reservation->increaseQty($id,$petshop);
        $request->session()->put('reservation', $reservation);

        //dd($reservation);

        return redirect()->route("reservationPage");
    }

    public function decreaseQuantity(Request $request,$id){
        $prevCart = $request->session()->get('reservation');
        $reservation = new Reservation($prevCart);

        $petshop = Petshop::find($id);
        $reservation->decreaseQty($id,$petshop);
        $request->session()->put('reservation', $reservation);

        //dd($reservation);

        return redirect()->route("reservationPage");
    }

}
