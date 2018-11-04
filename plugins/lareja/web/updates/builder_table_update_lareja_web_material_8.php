<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebMaterial8 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->text('production')->nullable(false)->unsigned(false)->default(null)->change();
            $table->dropColumn('name');
            $table->dropColumn('file_ref');
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->boolean('production')->nullable(false)->unsigned(false)->default(null)->change();
            $table->string('name', 255);
            $table->text('file_ref');
        });
    }
}
