<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service',
        'link',
        'quantity',
        'price',
        'order_id',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
