<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property string $ticket_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $payment_status
 * @property bool|null $is_checked_in
 * @property string|null $payers_ref_id
 * @property string|null $payers_name
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';
	public $timestamps = false;

	protected $casts = [
		'is_checked_in' => 'bool'
	];

	protected $fillable = [
		'ticket_id',
		'name',
		'email',
		'payment_status',
		'is_checked_in',
		'payers_ref_id',
		'payers_name'
	];
}
