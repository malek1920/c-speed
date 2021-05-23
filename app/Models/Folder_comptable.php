<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder_comptable extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_f',
        'name',
        'user_id',
    ];
}
