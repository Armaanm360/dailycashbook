<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Model;

class InvoicePosSale extends Model
{
    protected $table = "invoice_pos_sales";
    protected $primaryKey = "sale_id";
    protected $guarded = []; 
}
