<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservationHost extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->boolean('enabled');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->dropColumn('enabled');
        });
    }
}
