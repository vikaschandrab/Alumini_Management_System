<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('jobsId');
            $table->bigInteger('aluminiId_fk')->unsigned();
            $table->foreign('aluminiId_fk')->references('aluminiId')->on('aluminis')->onUpdate('cascade');
            $table->string('experiance');
            $table->string('position');
            $table->string('company');
            $table->string('website');
            $table->integer('vacancies');
            $table->string('referal');
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
        Schema::dropIfExists('jobs');
    }
}
