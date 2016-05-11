<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use View;
use Validator;
use Input;
use Redirect;
use Lang;
use URL;
use App\Group;
class GroupsController extends Controller
{
	
	public function __construct()
    {
        // CSRF Protection
        //$this->beforeFilter('csrf', array('on' => 'post'));
        //$this->messageBag = new MessageBag;
        $this->group = new Group;
    }
    /**
     * Show a list of all the groups.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the groups
        $roles = Group::paginate(5);//Sentinel::getRoleRepository()->all();

        // Show the page
        return View('/groups/index', compact('roles'));
    }

    /**
     * Group create.
     *
     * @return View
     */
    public function getCreate()
    {
        // Show the page
        return View('/groups/create');
    }

    /**
     * Group create form processing.
     *
     * @return Redirect
     */
    public function postCreate(Request $request)
    {
        // Declare the rules for the form validation
        $rules = array(
            'group_name' => 'required|unique:groups'
        );

        //manually add slug to Input array for validation
        //Input::merge(array('slug' => str_slug(Input::get('name'))));

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
		$request->request->add(array('is_removed' => '0'));
		$input = Input::except(['_method', '_token']);
		$groupId = Group::insertGetId($input);
		if($groupId > 0) {
			return Redirect::route('groups')->with('error', Lang::get('groups/message.success.create'));
		} else {
			return Redirect::route('create/group')->withInput()->with('error', Lang::get('groups/message.error.create'));
		}

        /*if ($role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => Input::get('name'),
            'slug' => str_slug(Input::get('name'))
        ])) {
            // Redirect to the new group page
            return Redirect::route('groups')->with('success', Lang::get('groups/message.success.create'));
        }*/
		

        // Redirect to the group create page
        //return Redirect::route('create/group')->withInput()->with('error', Lang::get('groups/message.error.create'));
    }

    /**
     * Group update.
     *
     * @param  int  $id
     * @return View
     */
    public function getEdit($id = null)
    {


        
        try {
            // Get the group information
            $role = Group::find($id);

        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Redirect::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Show the page
        return View('/groups/edit', compact('role'));
    }

    /**
     * Group update form processing page.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function postEdit($id, Request $request)
    {
        try {
            // Get the group information
            $group = Group::find($id);
        } catch (GroupNotFoundException $e) {
            // Redirect to the groups management page
            return Rediret::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }

        // Declare the rules for the form validation
        $rules = array(
            'group_name' => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Update the group data
        $group->group_name        = $request->group_name;

        // Was the group updated?
        if ($group->save()) {
            // Redirect to the group page
            return Redirect::route('groups');//->with('success', Lang::get('groups/message.success.update'));
        } else {
            // Redirect to the group page
            return Redirect::route('update/group', $id)->with('error', Lang::get('groups/message.error.update'));
        }

    }

    /**
     * Delete confirmation for the given group.
     *
     * @param  int      $id
     * @return View
     */
    public function getModalDelete($id = null)
    {
        $model = 'groups';
        $confirm_route = $error = null;
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);


            $confirm_route =  route('delete/group',['id'=>$role->id]);
            return View('/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = Lang::get('admin/groups/message.group_not_found', compact('id'));
            return View('/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Delete the given group.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getDelete($id = null)
    {
        try {
            // Get group information
            $role = Sentinel::findRoleById($id);

            // Delete the group
            $role->delete();

            // Redirect to the group management page
            return Redirect::route('groups')->with('success', Lang::get('groups/message.success.delete'));
        } catch (GroupNotFoundException $e) {
            // Redirect to the group management page
            return Redirect::route('groups')->with('error', Lang::get('groups/message.group_not_found', compact('id')));
        }
    }

}
