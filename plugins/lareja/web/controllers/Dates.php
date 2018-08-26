<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Lareja\Web\Models\Date;
use Lareja\Web\Models\DateCaretaker;
use Illuminate\Support\Facades\DB;

class Dates extends Controller
{
    //public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend.Behaviors.RelationController','Backend\Behaviors\ReorderController'];
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    //public $relationConfig = 'config_relation.yaml';

    public $data;

    public $requiredPermissions = [
        'keeperManager'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Web', 'backend', 'keeper');
        //$this->addJs("/plugins/lareja/web/assets/scripts/dates.js", "1.0.0");
        //$this->addCss("/plugins/lareja/web/assets/styles/dates.css", "1.0.0");
    }

  public function create($context = null)
  {
    parent::create($context);
  }

  public function update($recordId, $context = null)
	{
    parent::update($recordId, $context);
    //$model = $this->formFindModelObject($recordId);
		//$this->initRelation($model);

	}

    /*



    public function update($recordId, $context = null)
	{

		$date = Date::select('date')->where('id',$recordId)->first();
		$careTakers = DateCaretaker::select('name','email','phone')
		->where('date_id', $recordId)
		->get();
		$this->data['date'] = $date;
		$this->data['careTakers'] = $careTakers;

	}
  */
}
