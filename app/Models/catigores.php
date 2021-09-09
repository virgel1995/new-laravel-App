<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Catigores extends Model
{
    use HasFactory;
    
    public $fillable = [
        'name',
    ];
    
    protected function post()
    {
        return $this->hasMany(Post::class);
    }
}
