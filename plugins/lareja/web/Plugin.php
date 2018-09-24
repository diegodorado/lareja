<?php namespace Lareja\Web;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
    public function pluginDetails()
    {
        return [
            'name'        => 'lareja.web::lang.plugin.name',
            'description' => 'lareja.web::lang.plugin.description',
            'author'      => 'Equipo web de la reja',
            'icon'        => 'icon-user',
            'homepage'    => 'https://github.com/diegodorado/lareja'
        ];
    }
}
