<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use App\Models\Catigores;
// use App\Models\User;

// class Post extends Model
// {
//     use HasFactory;

//     public $fillable = [
//     'title',
//     'content',
//     'image',
//     'category_id'
// ];

//     protected function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     protected function catigores()
//     {
//         return $this->belongsTo(Catigores::class);
//     }

//     public function comments()
//     {
//         return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
//     }

//     protected function attachment()
//     {
//         return $this->hasMany(Attachment::class);
//     }

//     public function isToday()
//     {
//         return Post::where('created_at', Carbon::today())->get();
//     }
// }
