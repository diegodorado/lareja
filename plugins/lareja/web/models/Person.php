<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
      //'email'                 => 'required|email',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'lareja_web_person';
}
