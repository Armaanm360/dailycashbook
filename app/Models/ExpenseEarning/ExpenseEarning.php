<?php

namespace App\Models\ExpenseEarning;

use Illuminate\Database\Eloquent\Model;

class ExpenseEarning extends Model
{
    protected $table = "expense_earning";
    protected $primaryKey = 'ex_earn_id';
    protected $guarded = [];
}
