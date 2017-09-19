<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebPerson extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_person', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->boolean('is_master');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_person');
    }
}
