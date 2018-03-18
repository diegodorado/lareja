<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class DateCaretaker extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lareja_web_date_caretaker';
}
