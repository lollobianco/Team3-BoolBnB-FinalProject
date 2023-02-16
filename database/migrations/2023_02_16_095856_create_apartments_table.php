<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {

            $table->id();
            $table->string ('name');
            $table->text ('description');
            $table->string ('cover_image');
            $table->string ('rooms');
            $table->string ('beds');
            $table->string ('bathrooms');
            $table->string ('mq');
            $table->string ('accomodation');
            $table->string ('lat');
            $table->string ('long');
            $table->string ('address');
            $table->boolean ('available');
            $table->decimal ('price');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}