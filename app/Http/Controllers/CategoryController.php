<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use App\CategoryModel;
use DB;
use Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')->orderBy('id', 'desc')->paginate(10);
        return View('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //print_r($request->all());
        $rules = array('category_title' => 'required');
        $messages = array('category_title' => 'Category title is required!');
        $Validator = Validator::make($request->all(), $rules, $messages);
        $edit_id = Input::get('edit_id');
        if($Validator->fails())
        {
            echo 0;
        }
        else
        {
            $status = ($request->is_removed == 'on') ? 1 : 0;
            $request->request->add(array('is_removed' => $status));
            $input = Input::except('_token');
            if($request->edit_id)
            {
                CategoryModel::where('id', $edit_id)->update(
                [
                'category_title' => $request->category_title,
                'is_removed' => $status
                ]);
                echo json_encode($request->all());
            }
            else
            {
                CategoryModel::create($request->all());
                echo 1;
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryModel::where('id', '=', $id)->delete();
        $ID = CategoryModel::where('id', '=', $id)->first();
        echo $ID;
    }
}
