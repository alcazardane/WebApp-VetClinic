<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHealthRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthrecords', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('weight');
            $table->dropColumn('temp');
            $table->dropColumn('checkup');
            $table->dropColumn('treatment');
            $table->dropColumn('vaxmeds');
            $table->string('recid');
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
