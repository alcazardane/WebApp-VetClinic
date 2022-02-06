<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vaxhistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaxhistory', function (Blueprint $table) {
            $table->id();
            $table->string('vaxdesc');
            $table->string('vet');
            $table->date('date');
            $table->date('fdate');
            $table->string('status');
            $table->string('recid');
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
