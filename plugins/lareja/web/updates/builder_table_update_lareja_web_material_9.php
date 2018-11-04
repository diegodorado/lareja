<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebMaterial9 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->string('type');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
