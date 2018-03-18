<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLarejaWebCaretakerDate extends Migration
{
    public function up()
    {
        Schema::dropIfExists('lareja_web_caretaker_date');
    }
    
    public function down()
    {
        Schema::create('lareja_web_caretaker_date', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('date')->nullable();
        });
    }
}
