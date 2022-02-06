<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SurgicalHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgicalhistory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datetime');
            $table->string('weight');
            $table->string('procedure');
            $table->string('pam');
            $table->string('aa');
            $table->string('sas');
            $table->string('techinit');
            $table->string('assinit');
            $table->string('vetinit');
            $table->string('lengthsurgery');
            $table->string('specimens');
            $table->string('comments');
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
