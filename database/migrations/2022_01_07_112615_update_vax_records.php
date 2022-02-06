<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVaxRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaxrecords', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('weight');
            $table->dropColumn('vaxdesc');
            $table->dropColumn('vet');
            $table->dropColumn('fdate');
            $table->dropColumn('status');
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
