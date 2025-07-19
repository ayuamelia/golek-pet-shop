<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petshop_id');
            $table->integer('reservation_id');
            $table->text('petshop_name');
            $table->enum('doctor', ['yes','no']);
            $table->enum('grooming', ['yes','no']);
            $table->enum('hotel', ['yes','no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_items');
    }
}
