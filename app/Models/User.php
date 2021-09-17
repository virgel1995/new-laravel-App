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

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    // database relations

    public function country() : HasMany
    {
        return $this->hasMany(Country::class);
    }

    protected function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    protected function friends(): HasMany
    {
        return $this->hasMany(Friend::class);
    }

    protected function userContacts(): HasMany
    {
        return $this->hasMany(User_contact::class);
    }

    protected function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    protected function blockLists(): HasMany
    {
        return $this->hasMany(Block_list::class);
    }
    protected function converstions(): HasMany
    {
        return $this->hasMany(Converstion::class);
    }
}
