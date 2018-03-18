<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLarejaWebFecha extends Migration
{
    public function up()
    {
        Schema::dropIfExists('lareja_web_fecha');
    }
    
    public function down()
    {
        Schema::create('lareja_web_fecha', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('fecha');
        });
    }
}
