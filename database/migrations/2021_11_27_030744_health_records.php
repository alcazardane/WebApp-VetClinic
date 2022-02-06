<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HealthRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthrecords', function (Blueprint $table) {
            $table->id();
            $table->string('ownername');
            $table->string('petname');
            $table->string('address');
            $table->string('birthday');
            $table->string('species');
            $table->string('breed');
            $table->string('contactnum');
            $table->string('date');
            $table->string('weight');
            $table->string('temp');
            $table->string('checkup');
            $table->string('treatment');
            $table->string('vaxmeds');
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
