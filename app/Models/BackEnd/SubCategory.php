<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function category(){
    	return $this->belongsTo('App\Models\BackEnd\Category');
    }
    public function product(){
    	return $this->belongsTo('App\Models\BackEnd\Product');
    }


}
