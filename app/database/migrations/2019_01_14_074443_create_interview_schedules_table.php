<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('candidate_id');            
            $table->date('date');
            $table->time('time');
            $table->string('state');
            $table->string('city');
            $table->integer('scheduled')->nullable();
            $table->integer('interviewed')->nullable();
            $table->integer('finallized')->nullable();
            $table->text('note_scheduled')->nullable();
            $table->text('note_interviewed')->nullable();
            $table->text('note_finallized')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('interview_schedules');
    }
}
