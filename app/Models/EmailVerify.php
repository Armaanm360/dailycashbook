<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerify extends Model
{
    protected $table = "email_verification_table";
    protected $primaryKey = 'verify_id';
    protected $guarded = [];
}
