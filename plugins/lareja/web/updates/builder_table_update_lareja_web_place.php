<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebPlace extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_place', function($table)
        {
            $table->integer('capacity')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_place', function($table)
        {
            $table->dropColumn('capacity');
        });
    }
}
