<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    public $fillable = [
        'activity_type',
        'activity_id',
        'title',
        'detail',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
