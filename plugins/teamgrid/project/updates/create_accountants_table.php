<?php namespace Teamgrid\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAccountantsTable extends Migration
{
    public function up()
    {
        Schema::create('teamgrid_project_accountants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('project_id');
            $table->integer('accounter_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teamgrid_project_accountants');
    }
}
