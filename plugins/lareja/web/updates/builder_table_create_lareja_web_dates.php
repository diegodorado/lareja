<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebDates extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_dates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('date');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_dates');
    }
}
