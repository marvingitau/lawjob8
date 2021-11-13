<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ["businessid", "transactionid", "status", "amount","trackingid","payment_method"];
}
