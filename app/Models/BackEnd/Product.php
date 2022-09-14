<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

}
