<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogPost extends Eloquent
{
	use SoftDeletes;

	/**
	 * The database connection associated with the model.
	 *
	 * @var string
	 */
	protected $connection = 'mongodb';

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'post';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * the fieldname is date
	 */
	public function getDateAttribute()
	{
		return Carbon::parse($this->attributes['date']);
	}

	public static function post_list()
	{
		//return DB::connection('mongodb')->collection('post')->paginate(3);
		return BlogPost::orderBy('date', 'desc')->whereNull('deleted_at')->paginate(3);
	}

	public static function post_delete($post_id) {
		BlogPost::where('_id', $post_id)->delete();
	}

	public static function post_retrieve($post_id)
	{
		return BlogPost::whereNull('deleted_at')->where('_id', $post_id)->first();
	}

	/**
	 * Create a new BlogPost instance
	 *
	 * @return BlogPost a newly BlogPost created and initialized
	 */
	public static function post_create()
	{
		$post = new BlogPost();

		/**
		 * Set the Post's author to the current user name
		 */
		$post->author = Auth::user()->name;

		/**
		 * Initialize the post date
		 */
		$post->date = Carbon::now()->toIso8601String();

		/**
		 * Prepare for hosting users' comments
		 */
		$post->comments = array();

		/**
		 * Set the default post language
		 */
		$post->language = 'en-US';

		return $post;
	}

	/**
	 * Bind the current BlogPost instance to the Request params
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$updatable = array('title', 'href', 'body');
		foreach($updatable as $field) {
			$this->$field = $request->$field;
		}

		$this->save();
	}
}
