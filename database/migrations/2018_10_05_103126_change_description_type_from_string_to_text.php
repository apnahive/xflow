<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDescriptionTypeFromStringToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {            
            $table->text('note')->nullable()->change();
        });
        Schema::table('projects', function (Blueprint $table) {            
            $table->text('description')->nullable()->change();
        });
        Schema::table('task_for_templates', function (Blueprint $table) {            
            $table->text('note')->nullable()->change();
        });
        Schema::table('task_templates', function (Blueprint $table) {            
            $table->text('detail')->nullable()->change();
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
