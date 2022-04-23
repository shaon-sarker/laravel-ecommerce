<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'address01',
        'address02',
        'country',
        'state',
        'city',
        'pincode',
        'comment',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderitems(){
        return $this->hasMany(Orderitem::class);
    }


}
