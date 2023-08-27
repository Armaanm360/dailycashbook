<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $table = "created_food_items";
    protected $primaryKey = "food_item_id";
    protected $guarded = [];
}
