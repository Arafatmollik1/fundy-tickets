<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    protected $table = 'post_content';

    protected $fillable = [
        'user_id',
        'fund_id',
        'header',
        'subheader',
        'img_src',
        'ticket_price',
        'place_of_event',
        'event_date',
    ];

    // Define the relationship with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
