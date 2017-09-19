<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
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

		$reservation_hosts = ReservationHost::select('*')
			->where('reservation_id',$this->recordId)
			->get();
		$return = "";
		foreach($reservation_hosts as $record){
			$this->data = $record["attributes"]["person_id"];
		}
		return $this->recordId;
		
	}
}
