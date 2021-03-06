<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // The with(?,?) contain with the name (variable to be use when to pass to the view) and the query function

	    return view('admin.categories.index') ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

	    return view('admin.categories.create');
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

	    $this->validate($request, [
	    	'name' => 'required'
	    ]);


	    //This is to save the input to the database
	    $category = new Category;

	    $category->name = $request -> name;
	    $category->save();

	    Session::flash('success', 'You successfully created a category');

	    return redirect()->route('categories');;


//	    dd($request->all());
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
	    $category = Category::find($id);

	    return view('admin.categories.edit') -> with('category', $category);

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

	    $category = Category::find($id);

	    $category->name = $request->name;

	    $category->save();

	    Session::flash('success', 'You successfully update a category');

	    return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

	    $category = Category::find($id);

	    $category->delete();

	    Session::flash('success', 'You successfully delete a category');

	    return redirect()->route('categories');
    }
}
