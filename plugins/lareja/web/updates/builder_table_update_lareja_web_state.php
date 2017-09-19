<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebState extends Migration
{
    public function up()
    {
        Schema::rename('lareja_web_reservation_state', 'lareja_web_state');
    }
    
    public function down()
    {
        Schema::rename('lareja_web_state', 'lareja_web_reservation_state');
    }
}
