<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Model implements
AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'username', 'title',
        'skill_level', 'role', 'email', 'password',
        'remember_token',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * The "booting" method of the model.
    *
    * @return void
    */
    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->entries()->delete();
        });
    }


    /* ========================================================================= *\
    * Relations
    \* ========================================================================= */

    /**
    * User has many projects
    */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    /* ========================================================================= *\
    * Helpers
    \* ========================================================================= */

    /**
    * Get existing or make new access token
    */
    public function makeApiToken()
    {
        return str_random(12);
    }

    /**
    * Is user admin
    *
    * @return bool
    */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
