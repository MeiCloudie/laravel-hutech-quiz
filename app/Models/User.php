<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method bool isAdmin();
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'role',
        'password',
        'faculty_id'
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

    public function getFullName() {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function isAdmin() {
        return $this->role === "ADMIN";
    }

    protected $attributes = [
        'role' => 'USER'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'user_to_rooms', 'user_id', 'room_id');
    }

}
