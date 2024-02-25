<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLogin
 * 
 * @property int $id
 * @property string $login_id
 * @property string $user_id
 * @property Carbon|null $login_time
 * @property string|null $login_method
 * @property string|null $session_id
 * @property string|null $fund_id
 * @property string|null $ref_id
 *
 * @package App\Models
 */
class UserLogin extends Model
{
	protected $table = 'user_login';
	public $timestamps = false;

	protected $casts = [
		'login_time' => 'datetime'
	];

	protected $fillable = [
		'login_id',
		'user_id',
		'login_time',
		'login_method',
		'session_id',
		'fund_id',
		'ref_id'
	];
}
