<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebMaterial extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->integer('person_id')->unsigned();
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->dropColumn('person_id');
            $table->dropColumn('name');
        });
    }
}
