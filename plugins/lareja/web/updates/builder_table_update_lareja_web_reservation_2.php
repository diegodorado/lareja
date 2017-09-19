<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservation2 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->integer('reservation_state_id');
            $table->dropColumn('state');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->dropColumn('reservation_state_id');
            $table->string('state', 255);
        });
    }
}
