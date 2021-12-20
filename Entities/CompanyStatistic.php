<?php

namespace Modules\User\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyStatistic extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
