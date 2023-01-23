<?php namespace Teamgrid\Task\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_task_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('project_id')->nullable();
            //$table->integer('task_manager_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();

            $table->date('due_date')->nullable();

            // $table->date('planned_start')->nullable();
            // $table->date('planned_end')->nullable();
            // $table->date('due_date')->nullable();
            // $table->time('planned_time')->nullable();
            // $table->time('tracked_time')->nullable();

            $table->boolean('done')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_task_tasks');
    }
}
