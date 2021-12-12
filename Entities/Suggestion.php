<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use App\Scopes\OrderingScope;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'suggest_id');
    }

    public function userSuggestion()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new OrderingScope);
    }
}
