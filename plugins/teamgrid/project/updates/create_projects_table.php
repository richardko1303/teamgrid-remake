<?php namespace Teamgrid\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->integer('customer_id');
            $table->integer('project_manager_id');
            

            $table->timestamp('due_date')->nullable();
            $table->boolean('done')->default(false);
            
            $table->timestamps();
        });

        Schema::create('teamgrid_project_accountants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('project_id');
            $table->integer('accounter_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_project_projects');
        Schema::dropIfExists('teamgrid_project_accountants');
    }
}
