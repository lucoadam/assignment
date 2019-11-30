<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
      'name',
      'image',
      'quantity',
      'rate',
      'description',
      'categories_id',
      'brand_id'
    ];
    //
    public function categories(){
        return $this->hasOne(Category::class,'categories_id');
    }

    public function brands(){
        return $this->hasOne(Brand::class,'brand_id');
    }

    public function users(){
        return $this->hasOne(User::class,'user_id');
    }

}
