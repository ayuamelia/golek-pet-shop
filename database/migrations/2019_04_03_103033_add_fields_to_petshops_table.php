<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPetshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petshops', function (Blueprint $table) {
            //
            $table->string('name',100);
            $table->string('image');
            $table->string('address',150);
            $table->string('sub_district',50);
            $table->string('city',50);
            $table->string('province',50);
            $table->string('operational_hour',50);
            $table->string('phone',15);
            $table->string('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petshops', function (Blueprint $table) {
            //
        });
    }
}
