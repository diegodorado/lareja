<?php namespace Lareja\Web\Models;

use Lareja\Web\Models\Material;


class MaterialImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            try {

                $m = Material::find($data['id']);

                $data['production'] =  array(array(
                    "lang" => "es",
                    "name" => $data['name'],
                    "file" => $data['file']
                ));
                unset($data['id']);
                unset($data['person']);
                unset($data['name']);
                unset($data['file']);

                if ($m) {
                  $m->fill($data);
                  if($m->isDirty()){
                    $m->save();
                    $this->logUpdated();
                  }else{
                    //fixme: never enters here
                    $this->logSkipped($row, "No changes");
                  }
                }else{
                  $m = Material::create($data);
                  $this->logCreated();
                }

            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}
