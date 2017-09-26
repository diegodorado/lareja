<?php namespace Lareja\Web\Controllers;

use Flash;
use DateTime;
use Backend\Classes\Controller;
use BackendMenu;
use Lareja\Web\Models\Person;
use Lareja\Web\Models\State;
use Lareja\Web\Models\Place;
use Lareja\Web\Models\Reservation;
use Lareja\Web\Models\ReservationHost;

class Reservations extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    
    public $recordId;
    public $data;

    public $requiredPermissions = [
        'reservationManager' 
    ];

    public function __construct()
    {
        parent::__construct();
        $this->addJs("/plugins/lareja/web/assets/scripts/reservation.js", "1.0.0");
        $this->addCss("/plugins/lareja/web/assets/styles/reservation.css", "1.0.0");
        BackendMenu::setContext('Lareja.Web', 'backend', 'reservations');
    }

	public function create($context = null){
		
		$this->getCreationFormData();
		return $this->asExtension('FormController')->create($context);
	}

	public function create_onSave(){

	}
	   	
    public function update($recordId, $context = null)
	{
		//
		// Se llama cuando cargo el formulario de actualización
		//
		$this->recordId = $recordId;
		$this->getReservationFormData();
		return $this->asExtension('FormController')->update($recordId, $context);
	}
	
    public function update_onSave($recordId, $context = null)
	{
        $model = $this->formFindModelObject($recordId);
        
		Reservation::where('id','=',$recordId)
					->update(post('data'));
		
		Flash::success("Reserva actualizada con éxito");

        if ($redirect = $this->makeRedirect('update', $model)) {
            return $redirect;
        }
		

	}
	public function remap(){}

	public function getReservationFormData(){
		
		// consultas SQL
		
		$reservation_data = Reservation::select('lareja_web_reservation.is_keeper',
			'lareja_web_reservation.total_amount',
			'lareja_web_reservation.paid_amount',
			'lareja_web_reservation.created_at',
			'lareja_web_reservation.workshop_people',
			'lareja_web_person.name as responsible_name',
			'lareja_web_person.last_name as responsible_last_name',
			'lareja_web_person.email as responsible_email',
			'lareja_web_state.id as state_id')
			->join('lareja_web_person','lareja_web_reservation.responsible_id','=','lareja_web_person.id')
			->join('lareja_web_state','lareja_web_reservation.state_id','=','lareja_web_state.id')
			->where('lareja_web_reservation.id','=',$this->recordId)
			->first();
			
		$reservation_hosts = ReservationHost::select('from','to','place_id','enabled',
			'lareja_web_person.name',
			'lareja_web_person.last_name')
			->join('lareja_web_person','lareja_web_reservation_host.person_id','=','lareja_web_person.id')
			->where('reservation_id',$this->recordId)
			->get();			
			
		$states_data = State::select('id','name')->get();
		$places_data 	= Place::select('id','name')->where('capacity','>',0)->get();

		// Fin consultas SQL

		$this->data = $reservation_data['attributes'];
		$this->data['created_at'] = (new DateTime($reservation_data['attributes']['created_at']))->format('d/m/Y H:i');
		
		$this->data['states'] 	= array();
		$this->data['places'] 	= array();
		$this->data['hosts'] 	= array();		
	
		foreach($states_data as $state){
			$this->data['states'][] = $state['attributes'];
		}
		
		foreach($reservation_hosts as $host){
			$this->data['hosts'][] = $host->attributes;
		}
		
		foreach($places_data as $place){
			$this->data['places'][] = $place['attributes'];
		}
				
	}

	public function getCreationFormData(){
		
		$persons_data 	= Person::select('id','name','last_name','email')->get();
		$states_data 	= State::select('id','name')->get();
		$places_data 	= Place::select('id','name')->where('capacity','>',0)->get();

		$this->data['persons'] 	= array();
		$this->data['states'] 	= array();
		$this->data['places'] 	= array();

		foreach($persons_data as $person){
			$this->data['persons'][] = $person['attributes'];
		}
		
		foreach($states_data as $state){
			$this->data['states'][] = $state['attributes'];
		}
		
		foreach($places_data as $place){
			$this->data['places'][] = $place['attributes'];
		}
	}
}
