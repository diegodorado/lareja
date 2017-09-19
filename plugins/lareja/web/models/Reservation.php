<?php namespace Lareja\Web\Models;

use Model;

/**
 * Model
 */
class Reservation extends Model
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
    public $table = 'lareja_web_reservation';

    public $belongsTo = [
        'place' => 'Lareja\Web\Models\Place',
		'state' => 'Lareja\Web\Models\State'
    ];

}
