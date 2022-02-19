<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabulatedRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('appointment')->unsigned()->nullable()->default(0);
            $table->integer('health')->unsigned()->nullable()->default(0);
            $table->integer('vaccine')->unsigned()->nullable()->default(0);
            $table->integer('grooming')->unsigned()->nullable()->default(0);
            $table->integer('consultation')->unsigned()->nullable()->default(0);
            $table->integer('surgical')->unsigned()->nullable()->default(0);
            $table->date('date');
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
