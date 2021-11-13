<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','company_name','location','website','postal_address','company_description','is_active'];
}
