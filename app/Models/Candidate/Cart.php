<?php

namespace App\Models\Candidate;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_name','price','quantity','user_email','package','duration','session_id'];
    // protected $guided=[];
}
