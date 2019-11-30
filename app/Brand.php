<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=[
        'name'
    ];
    //
    public function goods(){
        return $this->hasMany(Good::class,'brand_id');
    }
}
