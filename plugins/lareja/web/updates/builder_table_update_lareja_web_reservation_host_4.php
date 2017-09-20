<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservationHost4 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->date('from')->nullable(false)->unsigned(false)->default(null)->change();
            $table->date('to')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation_host', function($table)
        {
            $table->dateTime('from')->nullable(false)->unsigned(false)->default(null)->change();
            $table->dateTime('to')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
