<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;

class ShortUrl extends Model
{
    //

    protected $fillable = [
        'original_url',
        'short_code',
        'company_id',
        'user_id',
    ];

      public function user() {
        return $this->belongsTo(User::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

}
