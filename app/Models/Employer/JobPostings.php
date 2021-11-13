<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPostings extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
}
