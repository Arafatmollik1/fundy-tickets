<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $fund_id
 * @property Carbon $created_at
 * @property Carbon|null $last_login
 * @property string|null $ref_id
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'last_login' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'name',
		'email',
		'fund_id',
		'last_login',
		'ref_id'
	];
}
