<?php

namespace App\Models\Ingredients;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = "products";
    protected $primaryKey = 'product_id';
    protected $guarded = [];
}
