<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
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
        BackendMenu::setContext('Lareja.Web', 'backend', 'reservations');
    }
    
    public function update($recordId, $context = null)
	{
		//
		// Se llama cuando cargo el formulario de actualización
		//
		// 
		$this->recordId = $recordId;
		$this->renderReservationForm();
		return $this->asExtension('FormController')->update($recordId, $context);
	}
	
    public function update_onSave($recordId, $context = null)
	{
		//
		// Se llama cuando guardo los cambios via ajax
		//
		//
		
		return $this->asExtension('FormController')->update_onSave($recordId, $context);
	}
	
	public function renderReservationForm(){
		
		$reservation 	= "lareja_web_reservation";
		$person 		= "lareja_web_person";
		$state 			= "lareja_web_state";
		
		$select = $reservation.".is_keeper as keeper, ";
		$select += $person.".nombre as persona";
		
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
			
		$this->data = $reservation_data['attributes'];
			
		$states_data = State::select('id','name')->get();
		
		$this->data['states'] 	= array();
		$this->data['places'] 	= array();
		$this->data['hosts'] 	= array();		
	
		foreach($states_data as $state){
			$this->data['states'][] = $state['attributes'];
		}
		
		$reservation_hosts = ReservationHost::select('from','to','place_id','enabled',
			'lareja_web_person.name',
			'lareja_web_person.last_name')
			->join('lareja_web_person','lareja_web_reservation_host.person_id','=','lareja_web_person.id')
			->where('reservation_id',$this->recordId)
			->get();			
		
		foreach($reservation_hosts as $host){
			$this->data['hosts'][] = $host->attributes;
		}
		
		$places_data = Place::select('id','name')->get();
		foreach($places_data as $place){
			$this->data['places'][] = $place['attributes'];
		}
		if (false){
		echo '<pre>';
		var_dump($this->data);
		echo '</pre>';
		die();
			}

		
		
		
	}
}
