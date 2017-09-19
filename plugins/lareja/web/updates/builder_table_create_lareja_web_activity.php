<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebActivity extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_activity', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('date');
            $table->string('name', 255);
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_activity');
    }
}
