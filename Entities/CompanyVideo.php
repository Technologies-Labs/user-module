<?php

namespace Modules\UserModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CompanyVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded =[];

    public function user()
      {
          return $this->belongsTo(User::class);
      }
}
