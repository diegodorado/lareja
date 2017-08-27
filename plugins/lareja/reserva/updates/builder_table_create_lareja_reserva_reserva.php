<?php namespace Lareja\Reserva\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLarejaReservaReserva extends Migration
{
    public function up()
    {
        Schema::create('lareja_reserva_reserva', function($table)
        {
            $table->engine = 'InnoDB';
            $table->dateTime('ingreso');
            $table->dateTime('egreso');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lareja_reserva_reserva');
    }
}
