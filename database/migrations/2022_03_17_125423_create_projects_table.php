<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('projectId');
            $table->bigInteger('aluminiId_fk')->unsigned();
            $table->foreign('aluminiId_fk')->references('aluminiId')->on('aluminis')->onUpdate('cascade');
            $table->string('title');
            $table->longText('description');
            $table->string('guide');
            $table->string('achievements');
            $table->date('projectYear');
            $table->bigInteger('departmentId_fk')->unsigned();
            $table->foreign('departmentId_fk')->references('departmentId_fk')->on('aluminis')->onUpdate('cascade');
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
        Schema::dropIfExists('projects');
    }
}
