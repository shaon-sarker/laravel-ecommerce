<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;

    protected $table = 'orderitems';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function rtn_product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
