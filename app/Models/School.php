<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    use HasFactory;
}
