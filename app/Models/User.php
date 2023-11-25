<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post>
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the role associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->role=== $role) {
                    return true;
                }
            }
        }
        else {
            if ($this->role=== $roles) {
                return true;
            }
        }
        return false;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
