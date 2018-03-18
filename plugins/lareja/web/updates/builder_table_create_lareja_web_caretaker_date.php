<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebCaretakerDate extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_caretaker_date', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_caretaker_date');
    }
}
