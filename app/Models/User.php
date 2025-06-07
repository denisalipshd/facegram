<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'username',
        'password',
        'bio',
        'photo',
        'is_private',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_private' => 'boolean',
        ];
    }

    /**
     * Relasi ke semua post yang dibuat user
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relasi ke orang yang mengikuti user ini
     * contoh: $user->followers => orang yang mengikuti user ini
     */
    public function followers(): HasMany
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    /**
     * Relasi ke orang yang diikuti user ini
     * contoh: $user->followings => orang yang diikuti oleh user ini
     */
    public function followings(): HasMany
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
}
