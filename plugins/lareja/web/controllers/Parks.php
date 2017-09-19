<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Parks extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'parkManager' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Web', 'backend', 'parks');
    }
}