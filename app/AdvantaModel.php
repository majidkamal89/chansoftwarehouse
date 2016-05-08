<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser;
use View;
use Validator;
use Input;
use Session;
use Lang;
use URL;
use Request;
use Response;
use Redirect;
use App\ClientsModel;
use App\User;
class AdvantaModel extends EloquentUser {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
    protected $table = 'clients';
	public $timestamps = false;
	
	public function __construct()
    {
		$this->ClientsModel = new ClientsModel();
		$this->Users = new User();
	}
	
	public function showHome(){
		
		$clientsData = ClientsModel::with(array('clientsMedicaidDetail', 'user','facilitiesInfo'))->get();
		
		return $clientsData;
	}
	
	
}
