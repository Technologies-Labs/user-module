<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Database\Factories\OffersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\UserModule\Scopes\OfferScope;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new OfferScope);
    }

    protected static function newFactory()
    {
        return OffersFactory::new();
    }


}
