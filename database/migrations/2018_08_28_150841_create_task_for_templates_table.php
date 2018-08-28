<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskForTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_for_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); 
            $table->string('category');
            $table->time('estimated_time_to_complete')->nullable();
            $table->string('note');
            $table->string('task_template_id'); 
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
        Schema::dropIfExists('task_for_templates');
    }
}
