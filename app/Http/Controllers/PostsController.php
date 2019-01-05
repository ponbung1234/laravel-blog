<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //send the data from database (category) to the html page (view)
	    return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This is where it come when the user send a post message
//	    dd($request->all());

	    //This is the validation section that extend form the Controller
	    $this->validate($request, [
	    	//The field follow by condition that we set (each condition will be separated by this | symbol)
	    	'title' => 'required|max:255',
		    'featured' => 'required|image',
		    'content' => 'required'

	    ]);

		//Store the image to a folder and give it a name
	    $featured = $request->featured;

	    $featured_new_name = time().$featured->getClientOriginalName();

	    $featured->move('uploads/posts', $featured_new_name);

	    //Query the data into the database
	    // !!! The laravel will not allow the user to push massive data to the database
	    // !!! To allow this we have to modify the Post.php file ($fillable)

	    $post = Post::create([
	    	'title' => $request->title,
		    'content' => $request->content,
		    'featured' => 'uploads/posts/'.$featured_new_name,
		    'category_id' => $request->category_id

	    ]);

	    Session::flash('success', 'Post created !!');


	    dd($request->all());

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
        //
    }
}
