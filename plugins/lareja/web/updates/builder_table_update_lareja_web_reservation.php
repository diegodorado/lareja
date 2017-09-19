<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebReservation extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->string('state', 255);
            $table->integer('total_amount')->nullable()->unsigned();
            $table->integer('paid_amount');
            $table->integer('workshop_people');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_reservation', function($table)
        {
            $table->dropColumn('state');
            $table->dropColumn('total_amount');
            $table->dropColumn('paid_amount');
            $table->dropColumn('workshop_people');
        });
    }
}
