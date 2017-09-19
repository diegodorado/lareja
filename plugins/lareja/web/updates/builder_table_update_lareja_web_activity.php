<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebActivity extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_activity', function($table)
        {
            $table->integer('place_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_activity', function($table)
        {
            $table->dropColumn('place_id');
        });
    }
}
