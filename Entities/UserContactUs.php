<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContactUs extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "company_contact_us";
}
