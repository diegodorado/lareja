<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebDate extends Migration
{
    public function up()
    {
        Schema::rename('lareja_web_dates', 'lareja_web_date');
    }
    
    public function down()
    {
        Schema::rename('lareja_web_date', 'lareja_web_dates');
    }
}
