<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Converstion extends Model
{
    use HasFactory;
USE SoftDeletes;
protected $dates = ['deleted_at'];

 

    protected $fillable = [
        'title',
        'creator_id',
        'channel_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
