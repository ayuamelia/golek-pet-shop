<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('reserve_date');
            $table->enum('status',['reserve','approve','reject']);
            $table->date('approval_date');
            $table->integer('petshop_id');
            $table->text('petshop_name');
            $table->enum('doctor', ['yes','no']);
            $table->enum('grooming', ['yes','no']);
            $table->enum('hotel', ['yes','no']);
            $table->decimal('price',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
