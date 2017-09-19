<?php namespace Lareja\Web\Models;

use Model;
use Lareja\Web\Models\Person;

/**
 * Model
 */
class Material extends Model
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
    public $table = 'lareja_web_material';
    
    public $belongsTo = [
		'person' => 'Lareja\Web\Models\Person'
    ];
    
    public $attachOne = [
		'file' => 'System\Models\File'
    ];
    
    public function getPersonOptions($value, $formData){

		$list = array();
		$persons = Person::select('id','name','last_name','email')->get();
		foreach($persons as $person){
			$key = $person['attributes']['id'];
			$label = $person['attributes']['name'] . " " . $person['attributes']['last_name'] . " &nbsp;&nbsp;[".$person['attributes']['email']."]";
			$list[ $key ] = $label;
		}
		return $list;
	}
}
