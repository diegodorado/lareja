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
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'is_master'];

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
    protected  $primaryKey = 'id';

}
