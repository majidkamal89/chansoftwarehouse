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
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;

class UsersController extends Controller
{
    protected $countries = array(
        ""   => "Select Country",
        "AF" => "Afghanistan",
        "AL" => "Albania"
    );

    /**
     * Declare the rules for the form validation
     *
     * @var array
     */
    protected $validationRules = array(
        'first_name'       => 'required|min:3',
        'last_name'        => 'required|min:3',
        'email'            => 'required|email|unique:users',
        'password'         => 'required|between:3,32',
        'password_confirm' => 'required|same:password',
        'pic' => 'mimes:jpg,jpeg,bmp,png|max:10000'
    );

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the users
        $users = User::All();

        // Show the page
        return View('users.index', compact('users'));
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function getCreate()
    {
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();

        // Show the page
        return View('users/create',compact('groups'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function postCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'group'            => 'required|numeric',
            'pic'              => 'mimes:jpg,jpeg,bmp,png|max:10000'
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //upload image
        if ($file = Input::file('pic'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);
        }

        //check whether use should be activated by default or not
        $activate = Input::get('activate')?true:false;

        try {
            // Register the user
            $user = Sentinel::register(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
                'dob'   => Input::get('dob'),
                'bio'   => Input::get('bio'),
                'pic'   => isset($safeName)?$safeName:'',
                'gender'   => Input::get('gender'),
                'country'   => Input::get('country'),
                'state'   => Input::get('state'),
                'city'   => Input::get('city'),
                'address'   => Input::get('address'),
                'postal'   => Input::get('postal'),
            ),$activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById(Input::get('group'));
            $role->users()->attach($user);

            //check for activation and send activation mail if not activated by default
            if(!Input::get('activate')) {
                // Data to be used on the email view
                $data = array(
                    'user'          => $user,
                    'activationUrl' => URL::route('activate', $user->id, Activation::create($user)->code),
                );

                // Send the activation code through email
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Welcome ' . $user->first_name);
                });
            }

            // Redirect to the home page with success menu
            return Redirect::route("users")->with('success', Lang::get('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = Lang::get('/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * User update.
     *
     * @param  int  $id
     * @return View
     */
    public function getEdit($id = null)
    {
            // Get the user information
            if($user = Sentinel::findById($id))
            {
                // Get this user groups
                $userRoles = $user->getRoles()->lists('name', 'id')->all();

                // Get a list of all the available groups
                $roles = Sentinel::getRoleRepository()->all();

            }
            else
            {
                // Prepare the error message
                $error = Lang::get('users/message.user_not_found', compact('id'));

                // Redirect to the user management page
                return Redirect::route('users')->with('error', $error);
            }

        $countries = $this->countries;
        $status = Activation::completed($user);

        // Show the page
        return View('/users/edit', compact('user', 'roles', 'userRoles','countries','status'));
    }

    /**
     * User update form processing page.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function postEdit($id = null)
    {
        try {
            // Get the user information
            $user = Sentinel::findById($id);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        //
        $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";

        // Do we want to update the user password?
        if ( ! $password = Input::get('password')) {
            unset($this->validationRules['password']);
            unset($this->validationRules['password_confirm']);
        }

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $this->validationRules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        try {
            // Update the user
            $user->first_name  = Input::get('first_name');
            $user->last_name   = Input::get('last_name');
            $user->email       = Input::get('email');
            $user->dob   = Input::get('dob');
            $user->bio   = Input::get('bio');
            $user->gender   = Input::get('gender');
            $user->country   = Input::get('country');
            $user->state   = Input::get('state');
            $user->city   = Input::get('city');
            $user->address   = Input::get('address');
            $user->postal   = Input::get('postal');

            // Do we want to update the user password?
            if ($password) {
                $user->password = Hash::make($password);
            }

            // is new image uploaded?
            if ($file = Input::file('pic'))
            {
                $fileName        = $file->getClientOriginalName();
                $extension       = $file->getClientOriginalExtension() ?: 'png';
                $folderName      = '/uploads/users/';
                $destinationPath = public_path() . $folderName;
                $safeName        = str_random(10).'.'.$extension;
                $file->move($destinationPath, $safeName);

                //delete old pic if exists
                if(File::exists(public_path() . $folderName.$user->pic))
                {
                    File::delete(public_path() . $folderName.$user->pic);
                }

                //save new file path into db
                $user->pic   = $safeName;

            }

            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = Input::get('groups', array());

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd    = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups
            foreach ($rolesToAdd as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->detach($user);
            }

            // Activate / De-activate user
            $status = $activation = Activation::completed($user);
            if(Input::get('activate') != $status)
            {
                if(Input::get('activate'))
                {
                    $activation = Activation::exists($user);
                    if($activation)
                    {
                        Activation::complete($user, $activation->code);
                    }
                }
                else
                {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);

                    //send activation mail
                    $data = array(
                        'user'          => $user,
                        'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                    );

                    // Send the activation code through email
                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                        $m->subject('Welcome ' . $user->first_name);
                    });

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('users.update', $id)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (LoginRequiredException $e) {
            $error = Lang::get('users/message.user_login_required');
        }

        // Redirect to the user page
        return Redirect::route('users.update', $id)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return View('/deleted_users', compact('users'));
    }

    


    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id)  {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View('/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id' ));
            return View('/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('delete/user',['id' => $user->id]);
        return View('/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getDelete($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('users')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('/users/message.user_not_found', compact('id' ));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if($user->country) {
                $user->country = $this->countries[$user->country];
            }
            
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        // Show the page
        return View('users.show', compact('user'));
        
    }

    /**
     * Get user access state
     *
     * @return View
     */
    public function getUserAccess()
    {
        if (Sentinel::getUser()->inRole('admin')) {

            $userAccess = "admin";
        }
        else {
            $userAccess = "others";
        }

        // Show the page
        return View('/groups/any_user', compact('userAccess'));
    }

    /**
     * Show View or redirect to 404
     *
     * @return View
     */
    public function getAdminOnlyAccess()
    {
        if (Sentinel::getUser()->inRole('admin')) {

            return View('/groups/admin_only');
        }
        else {
            return View('/404');
        }

        // fallback
        return View('/404');
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
}
