<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
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
		return BlogPost::whereNull('deleted_at')->where('id', $post_id)->get();
	}
}
