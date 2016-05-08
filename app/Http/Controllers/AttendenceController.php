<?php namespace App\Http\Controllers;
use Sentinel;
use View;
use Validator;
use Input;
use Session;
use Redirect;
use Lang;
use URL;
use Mail;
use File;
use App\AttendenceModel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;

class AttendenceController extends AdvantaController
{
	 
	public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));
		$this->attendee = new AttendenceModel();
	}
	 
    public function getIndex()
    {
		return $this->attendee->getIndex();
    }

}
