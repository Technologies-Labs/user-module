<?php

namespace Modules\User\Entities;

use App\Models\User;
use Database\Factories\CompanyAddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return CompanyAddressFactory::new();
    }
}
