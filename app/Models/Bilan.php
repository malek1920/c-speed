<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'mv_comptable_id',
        'nom',
        'actif',
        'passif',
        'm_actif',
        'm_passif',
    ];
}
