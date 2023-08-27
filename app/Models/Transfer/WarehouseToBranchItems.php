<?php

namespace App\Models\Transfer;

use Illuminate\Database\Eloquent\Model;

class WarehouseToBranchItems extends Model
{
    protected $table = "warehouse_to_branch_items";
    protected $primaryKey = 'warehouse_to_branch_items_id';
    protected $guarded = [];
}
