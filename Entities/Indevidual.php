<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Indevidual extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

    // protected static function newFactory()
    // {
    //     return \Modules\User\Database\factories\IndevidualFactory::new();
    // }
}
