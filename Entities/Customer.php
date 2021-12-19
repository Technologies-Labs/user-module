<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

    //////  Relationships /////

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
