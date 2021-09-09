<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'participant_id',
        'report_type',
        'report_message',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
