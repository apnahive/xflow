<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project');
            $table->string('title');            
            $table->string('assignee');
            $table->date('duedate');
            $table->string('category');
            $table->time('estimated_time_to_complete')->nullable();
            $table->time('actual_time_to_complete')->nullable();
            $table->integer('status');
            $table->date('date_completed');
            $table->string('note');            
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
        Schema::dropIfExists('tasks');
    }
}
