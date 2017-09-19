<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebPerson3 extends Migration
{
    public function up()
    {
        Schema::table('lareja_web_person', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('lareja_web_person', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}
