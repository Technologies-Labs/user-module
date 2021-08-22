<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CompanyCustomerSay extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

}

