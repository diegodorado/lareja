<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebFecha extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_fecha', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_fecha');
    }
}
