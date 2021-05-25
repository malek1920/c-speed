<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement_comptable_global extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'f_id',
        'code',
        'libelle',
        'm_credit_total',
    ];
}
