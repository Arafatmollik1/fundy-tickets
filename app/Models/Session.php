<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * 
 * @property string $hash
 * @property string $session_data
 * @property string $session_id
 * @property int $session_expire
 *
 * @package App\Models
 */
class Session extends Model
{
	protected $table = 'sessions';
	protected $primaryKey = 'session_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'session_expire' => 'int'
	];

	protected $fillable = [
		'hash',
		'session_data',
		'session_expire'
	];
}
