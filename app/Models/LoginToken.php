<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    protected $fillable = [
        'token',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
