<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'order_token',
        'user_id',
        'status'
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function details(){
        return $this->hasMany(Order_Detail::class, 'order_id', 'id');
    }
}
