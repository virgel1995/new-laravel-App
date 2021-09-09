<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particpants extends Model
{
    use HasFactory;
    public $fillable = [
        'conversation_id',
        'user_id',
        'type',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }  
}
