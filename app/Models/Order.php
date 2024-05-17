<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','order_no','ticket_amount','ticket_no','chances','total','payment_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
