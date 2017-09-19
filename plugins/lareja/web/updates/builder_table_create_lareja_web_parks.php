<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebParks extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_parks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->string('link');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_parks');
    }
}
