<?php namespace Lareja\Web\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class People extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend.Behaviors.ImportExportController','Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public $requiredPermissions = [
        'personManager'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lareja.Web', 'backend', 'people');
    }
}
