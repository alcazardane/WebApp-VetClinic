<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petprofile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petprofile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profilepicture');
            $table->string('petname');
            $table->string('petbreed');
            $table->string('petspecies');
            $table->string('petgender');
            $table->string('owneremail');
            $table->string('filerecord');
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
        //
    }
}
