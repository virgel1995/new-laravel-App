<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chating extends Model
{
    use HasFactory;
    public $fillable = [
        'messages' => 'array',
    ];
}
