<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodIngredients extends Model
{
    protected $table = "food_ingredients";
    protected $primaryKey = "food_ingredients_id";
    protected $guarded = [];
}
