<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservation3 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->renameColumn('reservation_state_id', 'state_id');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->renameColumn('state_id', 'reservation_state_id');
        });
    }
}
