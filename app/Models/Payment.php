<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @property int $id
 * @property string|null $payment_id
 * @property string|null $user_id
 * @property string|null $ref_id
 * @property string $ticket_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone_no
 * @property int|null $participant_no
 * @property string|null $participant_info
 * @property int|null $payment_amount
 * @property Carbon $payment_time
 * @property string|null $payment_status
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';
	public $timestamps = false;

	protected $casts = [
		'participant_no' => 'int',
		'payment_amount' => 'int',
		'payment_time' => 'datetime'
	];

	protected $fillable = [
		'payment_id',
		'user_id',
		'ref_id',
        'fund_id',
		'ticket_id',
		'payers_name',
		'payers_email',
		'payers_phone',
        'message',
		'participant_no',
        'ref_no',
        'amount',
        'payment_date',
        'status'
	];
}
