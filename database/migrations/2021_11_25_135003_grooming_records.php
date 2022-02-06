<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroomingRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groomingrecords', function (Blueprint $table) {
            $table->id();
            $table->string('ownername');
            $table->string('petname');
            $table->string('breed');
            $table->string('date');
            $table->string('weight');
            $table->string('service');
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
