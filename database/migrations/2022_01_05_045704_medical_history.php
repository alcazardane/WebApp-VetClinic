<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicalHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalhistory', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('weight');
            $table->string('temp');
            $table->string('checkup');
            $table->string('Treatment');
            $table->string('vxmx');
            $table->string('recid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.w
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
