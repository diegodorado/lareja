<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservationHost2 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->boolean('enabled')->default(1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->boolean('enabled')->default(null)->change();
        });
    }
}
