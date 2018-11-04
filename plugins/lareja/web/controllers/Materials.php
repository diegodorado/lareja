<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Materials extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend.Behaviors.ImportExportController'];
    public $formConfig = 'config_form.yaml';

    public $importExportConfig = 'config_import_export.yaml';


    public $listConfig = [
        'list' => 'config_list.yaml',
        'export' => 'export_list.yaml'
    ];


    public $requiredPermissions = [
        'materialsManager'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Web', 'backend', 'meterial');
    }
}
