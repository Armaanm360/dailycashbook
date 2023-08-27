<?php

namespace App\Models\CreateExpense;

use Illuminate\Database\Eloquent\Model;

class CreateExpense extends Model
{
    protected $table = "create_expense";
    protected $primaryKey = 'create_expense_id';
    protected $guarded = [];
}
