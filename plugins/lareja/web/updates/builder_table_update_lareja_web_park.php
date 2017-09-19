<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebPark extends Migration
{
    public function up()
    {
        Schema::rename('lareja_web_parks', 'lareja_web_park');
    }
    
    public function down()
    {
        Schema::rename('lareja_web_park', 'lareja_web_parks');
    }
}
