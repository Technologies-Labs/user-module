<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use App\Scopes\OrderingScope;
use Database\Factories\SuggestionsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

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
    
    protected static function newFactory()
    {
        return SuggestionsFactory::new();
    }

}
