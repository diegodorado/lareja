<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaWebReservationHost extends Migration
{
    public function up()
    {
        Schema::create('lareja_web_reservation_host', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->dateTime('from');
            $table->dateTime('to');
            $table->integer('place_id')->unsigned();
            $table->boolean('responsible');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_web_reservation_host');
    }
}
