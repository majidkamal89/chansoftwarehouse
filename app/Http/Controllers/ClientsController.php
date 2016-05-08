<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
use App\User;
use App\ClientsModel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;

class ClientsController extends Controller
{
	
	public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));
		$this->clients = new ClientsModel();
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return $this->clients->getIndex();
    }
	
	public function addNewClient()
	{
		return $this->clients->addNewClient();
	}
	
	public function getClientData($id){
		return $this->clients->getClientData($id);
	}
	
	public function editClientInfo(){
		return $this->clients->editClientInfo();
	}
}
