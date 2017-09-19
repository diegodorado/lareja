<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class Park extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lareja_web_park';
    
    public $attachOne = [
		'picture' => 'System\Models\File'
    ];
}
