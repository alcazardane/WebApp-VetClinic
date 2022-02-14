<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecordsHistoryStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthrecords', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('consultationrecords', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('vaxrecords', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('groomingrecords', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('surgicalrecords', function (Blueprint $table) {
            $table->string('status')->default('active');
        });

        Schema::table('vetstaff', function (Blueprint $table) {
            $table->string('status')->default('active');
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
