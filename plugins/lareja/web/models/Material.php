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
    protected $jsonable = ['production'];
    protected $fillable = ['person_id', 'production', 'type'];

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lareja_web_material';
    protected  $primaryKey = 'id';

    public $belongsTo = [
		    'person' => 'Lareja\Web\Models\Person'
    ];


    public function getPersonOptions($value, $formData){

		$list = array();
		$persons = Person::select('id','name','last_name','email')->get();
		foreach($persons as $person){
			$email = ' &nbsp;&nbsp;<span class="lighter">['.$person['attributes']['email'].']</span>';
			$key = $person['attributes']['id'];
			$label = $person['attributes']['name'] . " " . $person['attributes']['last_name'] . $email;
			$list[ $key ] = $label;
		}
		return $list;
	}
}
