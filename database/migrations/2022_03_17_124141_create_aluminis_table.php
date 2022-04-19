<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAluminisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluminis', function (Blueprint $table) {
            $table->bigIncrements('aluminiId');
            $table->bigInteger('UserId_fk')->unsigned();
            $table->foreign('UserId_fk')->references('UserId')->on('users')->onUpdate('cascade');
            $table->string('regNumber');
            $table->bigInteger('departmentId_fk')->unsigned()->nullable();
            $table->foreign('departmentId_fk')->references('departmentId')->on('departments')->onUpdate('cascade');
            $table->string('companyName')->nullable();
            $table->string('jobDesignation')->nullable();
            $table->string('jobExperiance')->nullable();
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
        Schema::dropIfExists('aluminis');
    }
}
