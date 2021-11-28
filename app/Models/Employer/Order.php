<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','users_email','payment_method','quantity', 'grand_total','order_verify',
    'package','expiry_date','session_id','trackingid','prodid',
    ];
}
