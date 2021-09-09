<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Friend;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'username',
        'email',
        'password',
        'country',
        'phone',
        'role',
        'is_active',
        'is_blocked',
        'preference',
        'avatar',
        'background',
        'last_seen',
        'is_email_verified',
        'friend' => 'array',
        'groups' => 'array',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->role === 'admin';
     }
 
    public function isUser() {
        return $this->role === 'user';
     } 
// database relations

    protected function post()
    {
        return $this->hasMany(Post::class);
    }

    protected function message()
    {
        return $this->hasMany(Message::class);
    }

    protected function friends()
    {
        return $this->hasMany(Friend::class);
    }

    protected function userContact()
    {
        return $this->hasMany(User_contact::class);
    }

    protected function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
    
    protected function blockList()
    {
        return $this->hasMany(Block_list::class);
    }
    protected function converstion()
    {
        return $this->hasMany(Converstion::class);
    }

}
