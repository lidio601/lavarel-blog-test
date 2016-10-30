<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use Log;

class EditorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the form to create a new BlogPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return view('editor', ['post' => null]);
    }

	/**
	 * Show the form to edit an existing BlogPost.
	 *
	 * @param $post_id BlogPost reference id
	 * @return \Illuminate\Http\Response
	 */
    public function edit($post_id)
    {
	    Log::debug("Editing post: ".$post_id);
	    $post = BlogPost::post_retrieve($post_id);
	    return view('editor', ['post' => $post]);
    }

	/**
	 * Show the form to create a new BlogPost.
	 *
	 * @param $post_id BlogPost reference id
	 * @return \Illuminate\Http\Response
	 */
    public function delete($post_id)
    {
	    Log::debug("Deleting post: ".$post_id);
	    BlogPost::post_delete($post_id);
		return redirect()->route('home');
    }

	/**
	 * Upsert the POSTed record into the DB
	 *
	 * @param  Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function upsert(Request $request)
    {
	    $input = (object)$request->all();
	    $post_id = $input->_id;

	    if($post_id) {
		    $post = BlogPost::post_retrieve($post_id);
	    } else {
		    $post = BlogPost::post_create();
	    }
	    Log::debug("Upserting post: ".($post_id or "NEW"));

	    $post->store($request);

	    //BlogPost::post_delete($post);
		return redirect()->route('home');
    }
}
