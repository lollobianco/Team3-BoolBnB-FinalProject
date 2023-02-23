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
            $table->integer ('rooms');
            $table->integer ('beds');
            $table->integer ('bathrooms');
            $table->integer ('mq');
            $table->integer ('accomodation');
            $table->double ('lat')->nullable();
            $table->double ('long')->nullable();
            $table->string ('address');
            $table->boolean ('available')->default(true);
            $table->float ('price');
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