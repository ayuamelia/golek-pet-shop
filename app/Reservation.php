<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayu
 * Date: 05/13/2019
 * Time: 13:08
 */

namespace App;


use function PHPSTORM_META\elementType;

class Reservation
{
    public $items;
    public $totalQuantity;
    public $totalPrice;

    public function __construct($prevCart)
    {
        if($prevCart != null){
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;

        } else{
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function checkReservation(){
        Session::get('reservation');
    }

    public function addItem($id, $petshop){

        $doctorPrice = (int) str_replace("Rp","",$petshop->doctor_price);
        $groomingPrice = (int) str_replace("Rp","",$petshop->grooming_price);
        $hotelPrice = (int) str_replace("Rp","",$petshop->hotel_price);


        if(isset($id, $this->items)) {
            $productToAdd = (['doctorQuantity'=>0,'groomingQuantity'=>0,'hotelQuantity'=>0,'doctorPrice'=>$doctorPrice, 'groomingPrice'=>$groomingPrice, 'hotelPrice'=>$hotelPrice,'data'=>$petshop]);

        }else{
            return redirect()->route("reservationPage")->withsuccess("You have made a reservation. Please submit or cancel it, before make other reservation");

        }

        //$productToAdd = ['doctorQuantity'=>0,'groomingQuantity'=>0,'hotelQuantity'=>0,'doctorPrice'=>$doctorPrice, 'groomingPrice'=>$groomingPrice, 'hotelPrice'=>$hotelPrice,'data'=>$petshop];


        $this->items[$id] = $productToAdd;
        $this->totalQuantity = 0;
        $this->totalPrice=0;
        //$this->totalQuantity = $this->totalQuantity+($doctorQuantity+$groomingQuantity+$hotelQuantity);
        //$this->totalPrice = $this->totalPrice+($doctorPrice+$groomingPrice+$hotelPrice);
    }


    public function increaseQty($id, $petshop){
            $productToAdd = $this->items[$id];
            if($productToAdd['doctorQuantity'] > 0){
                $productToAdd['doctorQuantity']++;
                $this->items[$id] = $productToAdd;
                $this->totalQuantity = $productToAdd['doctorQuantity'];
                $this->totalPrice= $productToAdd['doctorQuantity']*$productToAdd['doctorPrice'];
            }elseif ($productToAdd['groomingQuantity'] > 0){
                $productToAdd['groomingQuantity']++;
                $this->items[$id] = $productToAdd;
                $this->totalQuantity = $productToAdd['groomingQuantity'];
                $this->totalPrice= $productToAdd['groomingQuantity']*$productToAdd['groomingPrice'];
            }else{
                $productToAdd['hotelQuantity']++;
                $this->items[$id] = $productToAdd;
                $this->totalQuantity = $productToAdd['hotelQuantity'];
                $this->totalPrice= $productToAdd['hotelQuantity']*$productToAdd['hotelPrice'];
            }
    }

    public function decreaseQty($id, $petshop){
        $productToAdd = $this->items[$id];
        if($productToAdd['doctorQuantity']>0){
            $productToAdd['doctorQuantity']--;

            $this->items[$id] = $productToAdd;
            $this->totalQuantity = $productToAdd['doctorQuantity'];
            $this->totalPrice= $productToAdd['doctorQuantity']*$productToAdd['doctorPrice'];
        }elseif ($productToAdd['groomingQuantity'] > 0){
            $productToAdd['groomingQuantity']--;

            $this->items[$id] = $productToAdd;
            $this->totalQuantity = $productToAdd['groomingQuantity'];
            $this->totalPrice= $productToAdd['groomingQuantity']*$productToAdd['groomingPrice'];
        }else{
            $productToAdd['hotelQuantity']--;

            $this->items[$id] = $productToAdd;
            $this->totalQuantity = $productToAdd['hotelQuantity'];
            $this->totalPrice= $productToAdd['hotelQuantity']*$productToAdd['hotelPrice'];
        }
    }
    public function addDoctor(){
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item){
            $totalQuantity = $totalQuantity + $item['doctorQuantity'];
            $totalPrice = $totalPrice + $item['doctorPrice']*$item['doctorQuantity'];
        }
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

    public function addGrooming(){
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item){
            $totalQuantity = $totalQuantity + $item['groomingQuantity'];
            $totalPrice = $totalPrice + $item['groomingPrice']*$item['groomingQuantity'];
        }
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

    public function addHotel(){
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item){
            $totalQuantity = $totalQuantity + $item['hotelQuantity'];
            $totalPrice = $totalPrice + $item['hotelPrice']*$item['hotelQuantity'];
        }
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

    public function updatePriceAndQuantity(){
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item){
            $totalQuantity = $totalQuantity + $item['doctorQuantity'] + $item['groomingQuantity'] + $item['hotelQuantity'];
            $totalPrice = $totalPrice + $item['doctorPrice'] + $item['groomingPrice'] + $item['hotelPrice'];
        }
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

    public function clear()
    {
        $totalPrice = 0;
        $totalQuantity = 0;

        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

}









