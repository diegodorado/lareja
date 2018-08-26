<?php namespace Lareja\Web\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use Flash;
use Lareja\Web\Models\Reservation;


class ReservationForm extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Reservation Form',
            'description' => 'Simple Frontend Reservation Form'
        ];
    }

    public function onRun()
    {
      // Build a back-end form with the context of ‘frontend’
      $formController = new \Lareja\Web\Controllers\Reservations();

      $formController->create('backend');
      // Append the formController to the page
      $this->page['form'] = $formController;


    }

    public function onSave()
    {
      //return [‘error’ => \Mja\Forms\Models\Entry::create(post(‘Entry’))];
      return ['error' => 'testet'];
    }

    public function onAddItem()
    {
      //$reservation = new Reservation();

      //$reservation->name = Input::get('ńame');
      //$reservation->email = Input::get('email');

      //$reservation->save();

      //Flash::success('reserva ok');
      //return Redirect::back();

      return ['#result' => 'asdfasdf'];

    }

}
