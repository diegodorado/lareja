<?php namespace Lareja\Web\Models;

use Lareja\Web\Models\Person;


class PersonImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            try {

                $p = Person::find($data['id']);
                unset($data['id']);
                $data['is_master'] = (substr( $data['is_master'], 0, 1 ) === "S");

                if ($p) {
                  $p->fill($data);
                  if($p->isDirty()){
                    $p->save();
                    $this->logUpdated();
                  }else{
                    //fixme: never enters here
                    $this->logSkipped($row, "No changes");
                  }
                }else{
                  $p = Person::create($data);
                  $this->logCreated();
                }

            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}
