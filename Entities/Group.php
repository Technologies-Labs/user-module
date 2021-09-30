<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'settings' => 'array'
    ];

    public function supervisors()
    {
        return $this->belongsToMany(User::class , 'group_supervisors');
    }

    public function owner()
    {
        return $this->belongsToMany(User::class , 'group_supervisors')->wherePivot('is_owner' , 1);
    }

    public function requests() {
        return $this->belongsToMany(User::class , 'group_requests')->withPivot('invite_status');
    }

    public function members() {
        return $this->belongsToMany(User::class , 'group_members');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
