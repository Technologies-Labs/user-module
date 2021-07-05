<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

      //////  Relationships /////

      public function user()
      {
          return $this->belongsTo(User::class,'id');
      }
      public function indeviduals()
      {
          return $this->hasMany(Indevidual::class,'id');
      }
    // protected static function newFactory()
    // {
    //     return \Modules\UserModule\Database\factories\CompanyFactory::new();
    // }
}
