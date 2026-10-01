<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'price',
        'snap_token',
        'status',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
