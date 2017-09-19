<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebMaterial2 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->boolean('production');
            $table->string('path', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_material', function($table)
        {
            $table->dropColumn('production');
            $table->dropColumn('path');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
