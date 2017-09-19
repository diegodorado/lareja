<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebReservationState extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_reservation_state', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->nullable()->unsigned();
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_reservation_state');
    }
}
