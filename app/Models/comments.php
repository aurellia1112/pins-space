<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    protected $fillable = [
        'user_id',
        'pin_id',
        'comments',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pin(): BelongsTo
    {
        return $this->belongsTo(Pin::class);
    }
}