<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BlogPost;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    //$posts = DB::connection('mongodb')->collection('post')->paginate(3);
	    $posts = BlogPost::post_list();
	    return view('home', ['posts' => $posts]);
	    //$view->posts = DB::connection('mongodb')->collection('post')->get();
    }
}
