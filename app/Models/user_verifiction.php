<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_verifiction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'verification_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
