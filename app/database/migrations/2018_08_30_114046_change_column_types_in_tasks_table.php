<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypesInTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('estimated_time_to_complete')->nullable()->change();
            $table->integer('actual_time_to_complete')->nullable()->change();
            $table->date('date_completed')->nullable()->change();
            $table->string('note')->nullable()->change();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('estimated_time_to_complete');
            $table->dropColumn('actual_time_to_complete');
        });
    }
}
