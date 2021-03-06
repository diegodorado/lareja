<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class Date extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $jsonable = ['caretakers'];

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lareja_web_date';


    //public $hasMany = [
    //    'caretakers' => ['Lareja\Web\Models\DateCaretaker']
    //];

}
