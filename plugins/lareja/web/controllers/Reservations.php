<?php namespace Lareja\Web\Controllers;

use Flash;
use DateTime;
use Backend\Classes\Controller;
use BackendMenu;
use Lareja\Web\Constants;
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

		$data = post("data");
		$data['hosts'][0]['person_id'] = $data['person_id'];


		$workshop_count = 0;
		for($i=0;$i<count($data['hosts']);$i++){
			if ($data['hosts'][$i]['workshop']){
				$workshop_count += 1;
			}
			unset($data['hosts'][$i]['workshop']);
		}

		$reservation = array(
			'total_amount' 		=> count($data["hosts"]) * Constants::RESERVATION_NIGHT_PRICE,
			'workshop_people' 	=> 0,
			'state_id' 			=> Constants::RESERVATION_APPROVED,
			'responsible_id' 	=> $data["person_id"],
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		);

		$id = Reservation::insertGetId($reservation);

		for($i=0;$i<count($data['hosts']);$i++){
			$data['hosts'][$i]['reservation_id'] = $id;
			$from_parts = explode('-',$data['hosts'][$i]['from']);
			$data['hosts'][$i]['from'] = $from_parts[2] . $from_parts[1] .$from_parts[0];
			$to_parts = explode('-',$data['hosts'][$i]['to']);
			$data['hosts'][$i]['to'] = $to_parts[2] . $to_parts[1] .$to_parts[0];
		}

		ReservationHost::insert($data['hosts']);

		Flash::success("Se guardó todo y no hubo ningún error");

        if ($redirect = $this->makeRedirect('create', $model)) {
            return $redirect;
        }
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

		$data = post('data');

		Reservation::where('id','=',$recordId)
					->update($data['reservation']);

		ReservationHost::where('reservation_id','=',$recordId)->delete();

		for( $i=0; $i<count($data['hosts']); $i++ ){
			$data['hosts'][$i]['reservation_id'] = $recordId;
			if (isset($data['hosts'][$i]['enabled'])){
				$data['hosts'][$i]['enabled'] = 1;
			}
			else{
				$data['hosts'][$i]['enabled'] = 0;
			}
		}

		ReservationHost::insert($data['hosts']);

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

		$reservation_hosts = ReservationHost::select('person_id','from','to','place_id','enabled',
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
			$from_parts = explode('-',$host->attributes['from']);
			$host->attributes['from'] = $from_parts[2] .'-'. $from_parts[1] .'-'.$from_parts[0];
			$to_parts = explode('-',$host->attributes['to']);
			$host->attributes['to'] = $to_parts[2] .'-'. $to_parts[1] .'-'.$to_parts[0];
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
