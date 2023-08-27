<?php

namespace App\Models\PosTransferProduct;

use Illuminate\Database\Eloquent\Model;

class PosTransferProduct extends Model
{
    protected $table = "pos_transfer_products";
    protected $primaryKey = "transfer_product_id";
    protected $guarded = []; 
}
