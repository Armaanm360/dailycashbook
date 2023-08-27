<?php

namespace App\Models\Transfer;

use Illuminate\Database\Eloquent\Model;

class WarehouseToBranch extends Model
{
    protected $table = "warehouse_to_branches";
    protected $primaryKey = 'warehouse_to_branch_transfer_id';
    protected $guarded = [];
}
