<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OwneremailVaxrecordsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaxrecords', function (Blueprint $table) {
            $table->string('owneremail');
        });

        Schema::table('vaxhistory', function (Blueprint $table) {
            $table->string('owneremail');
            $table->string('ownername');
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
