<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class Activity extends Model
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
    public $table = 'lareja_web_activity';
    
    public $belongsTo = [
        'place' => 'Lareja\Web\Models\Place'
    ];
    
    public $attachOne = [
		'picture' => 'System\Models\File'
    ];
    
}
