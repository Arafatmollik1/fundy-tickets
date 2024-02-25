<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostContent
 * 
 * @property int $id
 * @property string|null $post_id
 * @property string|null $header
 * @property string|null $subheader
 * @property string|null $image_URL
 *
 * @package App\Models
 */
class PostContent extends Model
{
	protected $table = 'post_contents';
	public $timestamps = false;

	protected $fillable = [
		'post_id',
		'header',
		'subheader',
		'image_URL'
	];
}
