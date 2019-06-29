<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeOfEatimateTimeOfTaskForTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_for_templates', function (Blueprint $table) {
            $table->integer('estimated_time_to_complete')->nullable()->change();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_for_templates', function (Blueprint $table) {
            $table->dropColumn('estimated_time_to_complete');            
        });
    }
}
