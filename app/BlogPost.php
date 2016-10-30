<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BlogPost extends Eloquent
{

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

	public static function post_list() {
		//return DB::connection('mongodb')->collection('post')->paginate(3);
		return BlogPost::orderBy('date', 'desc')->paginate(3);
	}

}
