<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['subcategory_id', 'name', 'description', 'image', 'old_price', 'new_price', 'slug'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}

