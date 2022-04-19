<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['category_id','name','small_description','description','orginal_price','selling_price ','image','quantity','status','taxs','tranding','meta_title','meta_description','meta_keywords'];
}
