<?php namespace Lareja\Reserva\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Reserva extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'reservas-admin' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Reserva', 'main-menu-reservas');
    }
}