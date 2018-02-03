<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWeb extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('date_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_');
    }
}
