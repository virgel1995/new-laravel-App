<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block_list extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'participant_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
