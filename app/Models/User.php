<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Get the tuition postings for the user.
     */
    public function tuitionPostings()
    {
        return $this->hasMany(TuitionPosting::class);
    }

    /**
     * Get the profile picture of the user.
     */
    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class);
    }

    // Rest of your model code...
}
