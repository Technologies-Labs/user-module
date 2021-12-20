<?php

namespace Modules\User\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

      //////  Relationships /////

      public function user()
      {
          return $this->belongsTo(User::class,'id');
      }
      public function indeviduals()
      {
          return $this->hasMany(Indevidual::class,'id');
      }
      public function companyServices()
      {
          return $this->hasMany(CompanyService::class);
      }
    // protected static function newFactory()
    // {
    //     return \Modules\User\Database\factories\CompanyFactory::new();
    // }
}
