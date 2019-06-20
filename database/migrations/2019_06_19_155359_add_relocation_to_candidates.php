<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelocationToCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('relocation');
            $table->string('state1')->nullable()->change();
            $table->string('city1')->nullable()->change();
            $table->string('state2')->nullable()->change();
            $table->string('city2')->nullable()->change();
            $table->string('state3')->nullable()->change();
            $table->string('city3')->nullable()->change();
            $table->string('state4')->nullable()->change();
            $table->string('city4')->nullable()->change();
            
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
