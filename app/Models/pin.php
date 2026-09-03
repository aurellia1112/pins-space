<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'media',
        'media_type',
    ];

    /**
     * Pin dimiliki oleh User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Satu Pin memiliki banyak Like
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'pin_id');
    }

    /**
     * Satu Pin memiliki banyak Comment
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class, 'pin_id');
    }
}