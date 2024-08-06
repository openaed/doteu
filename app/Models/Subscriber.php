<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'signed_up_at',
    ];

    protected $casts = [
        'signed_up_at' => 'timestamp',
    ];
}