<?php

namespace App\Http\Controllers;

use App\Pet;
use App\ReservationModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        //$pet = DB::table('pets')->select('pets.name','pets.age', 'pets.type')->where('pets.customer_id',$user_id)->first();

        $pet = Pet::select('name','age','type')->where( 'user_id', $user_id )->get ();

            return view('home', ['home'=>$pet]);

    }

    public function editProfile(Request $request, $id){


        $user = User::find($id);
        $user_id = $user->id;
        $pet = Pet::where('user_id', $user_id)->get();
        return view('user.editProfile')->with('user', $user)->with('pet', $pet);
    }

    public function updateProfile(Request $request,$id){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

        $date = date('Y-m-d H:i:s');


        //dump($name);

        $arrayToUpdate = array("name"=>$name, "email"=>$email, "phone"=>$phone, "password"=>Hash::make($password), "updated_at"=>$date);
        DB::table('users')->where('id',$id)->update($arrayToUpdate);

        return redirect()->route("profile");


    }


    public function addPet(){
        return view("user.addNewPet");
    }

    public function sendNewPet(Request $request, $id){
        $name = $request->input('name');
        $age = $request->input('age');
        $type = $request->input('type');
        $date = date('Y-m-d H:i:s');

        $user = User::find($id);
        $id = $user->id;


        $newPet = array("user_id"=>$id, "name"=>$name, "age"=>$age , "type"=>$type, "created_at"=>$date, "updated_at"=>$date);
        //dd($newPet);
        $created = DB::table("pets")->insert($newPet);

        if ($created){
            return redirect()->route("profile");
        }else{
            return "New Pet was not created";
        }
    }

    public function profileHistory(Request $request, $id){
        $user = User::find($id);
        $id = $user->id;

        //dd($user);
        $history = ReservationModel::where( 'user_id', 'LIKE', '%' . $id . '%' )
            ->get();

        //dd($petshopData);
        return view("user.history")->with('history', $history);
    }
}
