<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau_comptable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adress',
        'phone',
        'user_id',
    ];
}
