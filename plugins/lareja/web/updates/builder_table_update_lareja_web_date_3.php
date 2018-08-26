<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebDate3 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_date', function($table)
        {
            $table->text('caretakers')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_date', function($table)
        {
            $table->dropColumn('caretakers');
        });
    }
}
