<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
        'school_id'
    ];
    public function school(){
        return $this->BelongsTo(School::class , 'school_id');
    }
}
