<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function pins(): HasMany
    {
        return $this->hasMany(Pin::class);
    }

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Pin::class, 'favorites')->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'is_admin' => 'boolean', // Add this
    ];
}
