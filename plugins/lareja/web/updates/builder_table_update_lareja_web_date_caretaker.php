<?php namespace Lareja\Web\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLarejaWebDateCaretaker extends Migration
{
    public function up()
    {
        Schema::rename('lareja_web_', 'lareja_web_date_caretaker');
    }
    
    public function down()
    {
        Schema::rename('lareja_web_date_caretaker', 'lareja_web_');
    }
}
