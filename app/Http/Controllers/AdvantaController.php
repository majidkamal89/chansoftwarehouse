<?php namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;
use App\AdvantaModel;

class AdvantaController extends Controller {

	/**
     * Message bag.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));

        //
        $this->messageBag = new MessageBag;
		$this->clients = new AdvantaModel();
    }

    public function showHome()
    {
    	if(Sentinel::check()){
			return View('index');
		}
		else{
			return Redirect::to('signin')->with('error', 'You must be logged in!');
		}
    }

    public function showView($name=null)
    {

    	if(View::exists('/'.$name))
		{
			if(Sentinel::check())
				return View('/'.$name);
			else
				return Redirect::to('signin')->with('error', 'You must be logged in!');
		}
		else
		{
			return View('404');
		}
    }

    public function showFrontEndView($name=null)
    {

        if(View::exists($name))
        {
            return View($name);
        }
        else
        {
            return View('404');
        }
    }


}