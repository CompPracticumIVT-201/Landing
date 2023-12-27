<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'question',
        'frequency',
        'new_arrivals',
        'selection_by_genre',
        'recommended_papers',
        'discount_notifications'
    ];
}
