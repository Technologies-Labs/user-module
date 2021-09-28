<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function supervisors()
    {
        return $this->belongsToMany(User::class);
    }

    public function owner()
    {
        return $this->belongsToMany(User::class)->wherePivot('is_owner' , 1);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
