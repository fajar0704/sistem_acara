<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'start',
        'end',
        'description',
        'price',
    ];

    public function transaction():HasMany
    {
        return $this->hasMany(Event::class);
    }
}
