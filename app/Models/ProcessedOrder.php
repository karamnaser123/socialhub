<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedOrder extends Model
{
    use HasFactory;
    protected $table = 'processed_orders';
    protected $fillable = [
        'order_id',
    ];
}

