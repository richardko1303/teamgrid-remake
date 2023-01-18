<?php namespace Teamgrid\Time\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_time_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('task_id')->nullable();

            $table->date('planned_start')->nullable();
            $table->date('planned_end')->nullable();
            $table->date('due_date')->nullable();
            $table->time('planned_time')->nullable();
            $table->time('tracked_time')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_time_time_entries');
    }
}
