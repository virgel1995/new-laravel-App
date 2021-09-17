<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deleted_conversation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $fillable = [
        'user_id',
        'conversation_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
