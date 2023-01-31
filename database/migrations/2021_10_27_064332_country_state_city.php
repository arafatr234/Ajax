<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CountryStateCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('country_state_city', function (Blueprint $table) {
           // $table->increments('country_state_city_id');
            $table->string('country');
            $table->string('state');
            $table->string('city');    
            $table->timestamps();


        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */


    public function down(){
        Schema::dropIfExists('country_state_city');
        
    }
}
