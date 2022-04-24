<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['category_id','name','small_description','description','orginal_price','selling_price ','image','quantity','status','taxs','tranding','meta_title','meta_description','meta_keywords'];


    public function rtl_category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }





}
