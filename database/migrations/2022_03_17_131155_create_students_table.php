<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('studentsId');
            $table->bigInteger('UserId_fk')->unsigned();
            $table->foreign('UserId_fk')->references('UserId')->on('users')->onUpdate('cascade');
            $table->string('StudentregNumber')->nullable();
            $table->bigInteger('departmentId_fk')->unsigned()->nullable();
            $table->foreign('departmentId_fk')->references('departmentId')->on('departments')->onUpdate('cascade');
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
        Schema::dropIfExists('students');
    }
}
