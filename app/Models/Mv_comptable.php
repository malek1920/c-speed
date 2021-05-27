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
        'libelle_debit',
        'libelle_credit',
        'm_debit',
        'm_credit',
        'mv_comp_global',
    ];
}
