<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\UserModule\Scopes\OfferScope;

class Offer extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new OfferScope);
    }


}
