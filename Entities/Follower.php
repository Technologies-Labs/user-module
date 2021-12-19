<?php

namespace Modules\UserModule\Entities;

use Database\Factories\FollowersFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follower extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return FollowersFactory::new();
    }
}
