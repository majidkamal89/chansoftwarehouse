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
use App\FacilitiesModel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;

class FacilityController extends AdvantaController
{
	 
	public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));
		$this->facilities = new FacilitiesModel();
	}
	 
    public function getIndex()
    {
		return $this->facilities->getIndex();
    }
	
	public function addNewFacility()
	{
		return $this->facilities->addNewFacility();
	}

}
