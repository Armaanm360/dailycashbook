<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    protected $table = "restaurant_tables";
    protected $primaryKey = 'restaurant_table_id';
    protected $guarded = [];
}
