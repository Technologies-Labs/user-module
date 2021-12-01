<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\UserModule\Scopes\BrandScope;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function booted()
    {
        static::addGlobalScope(new BrandScope);
    }
}
