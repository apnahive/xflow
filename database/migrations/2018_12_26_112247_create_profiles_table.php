<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('employer');
            //$table->text('description');
            $table->integer('experience_level');
            $table->integer('experience_years');
            $table->integer('active');

            $table->string('state');
            $table->string('city');

            $table->string('state1');
            $table->string('city1');
            $table->string('state2');
            $table->string('city2');
            $table->string('state3');
            $table->string('city3');
            $table->string('state4');
            $table->string('city4');

            $table->integer('qualification');
            $table->integer('certificate');
            //$table->date('start_date');
            $table->string('skills');
            $table->integer('salary_expected');
            $table->string('file')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
