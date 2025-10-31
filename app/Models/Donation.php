<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'message',
        'is_anonymous',
        'user_id',
        'post_id',
        'donor_name',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_anonymous' => 'boolean',
    ];

    /**
     * Get the user that made the donation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post that was donated to.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the donor name for display.
     */
    public function getDonorNameAttribute($value): string
    {
        if ($this->is_anonymous) {
            return 'Anonymous';
        }

        if ($this->user) {
            return $this->user->name;
        }

        return $value ?: 'Anonymous';
    }

    /**
     * Scope to get only non-anonymous donations.
     */
    public function scopePublic($query)
    {
        return $query->where('is_anonymous', false);
    }
}
