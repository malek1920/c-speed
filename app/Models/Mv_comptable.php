<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mv_comptable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'f_id',
        'code',
        'libelle',
        'm_debit',
        'm_credit',
    ];
}
