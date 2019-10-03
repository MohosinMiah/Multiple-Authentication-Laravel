<?php

namespace App;

use App\Notifications\WritterResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Writer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'writer';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new WritterResetPasswordNotification($token));
    }
}
