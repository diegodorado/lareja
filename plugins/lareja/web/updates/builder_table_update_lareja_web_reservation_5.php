<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservation5 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->integer('state_id')->default(1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->integer('state_id')->default(null)->change();
        });
    }
}
