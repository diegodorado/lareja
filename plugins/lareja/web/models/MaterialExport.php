<?php namespace Lareja\Web\Models;

use Lareja\Web\Models\Material;


class MaterialExport extends \Backend\Models\ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $materials = Material::all();
        $materials->each(function($m) use ($columns) {
            $m->addVisible($columns);
        });
        return $materials->toArray();
    }
}
