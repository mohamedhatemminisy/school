<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
        'order_id',
        'pivot'
    ];
    public function order(){
        return $this->BelongsTo(Order::class , 'order_id');
    }
}
