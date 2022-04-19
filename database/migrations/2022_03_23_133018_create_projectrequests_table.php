<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_requests', function (Blueprint $table) {
            $table->bigIncrements('requestId');
            $table->bigInteger('aluminiId_fk')->unsigned();
            $table->foreign('aluminiId_fk')->references('aluminiId')->on('aluminis')->onUpdate('cascade');
            $table->bigInteger('studentsId_fk')->unsigned();
            $table->foreign('studentsId_fk')->references('studentsId')->on('students')->onUpdate('cascade');
            $table->bigInteger('projectId_fk')->unsigned();
            $table->foreign('projectId_fk')->references('projectId')->on('projects')->onUpdate('cascade');
            $table->longText('requestInfo');
            $table->longText('replyInfo')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('replayStatus');
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
        Schema::dropIfExists('project_requests');
    }
}
