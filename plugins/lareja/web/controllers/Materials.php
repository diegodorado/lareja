<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Materials extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'materialsManager' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Web', 'backend', 'meterial');
    }
}