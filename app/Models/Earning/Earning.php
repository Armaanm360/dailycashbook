<?php

namespace App\Models\Earning;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $table = "earnings";
    protected $primaryKey = 'earning_id';
    protected $guarded = [];
}
