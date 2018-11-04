<?php namespace Lareja\Web\Models;

use Lareja\Web\Models\Person;


class PersonExport extends \Backend\Models\ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $people = Person::all();
        $people->each(function($p) use ($columns) {
            $p->addVisible($columns);
        });
        return $people->toArray();
    }
}
