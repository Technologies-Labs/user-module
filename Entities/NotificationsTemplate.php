<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationsTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
}
