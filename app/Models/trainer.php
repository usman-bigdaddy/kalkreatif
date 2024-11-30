<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
class trainer extends Authenticable
{
    protected $guard = 'trainer';
    protected $fillable = [
        'email',
        'image',
        'trainer_class',
        'trainer_firstname',
        'trainer_lastname',
        'password',
        'trainer_phonenumber',
        'trainer_address',
        'trainer_gender'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function classes()
    {
        return $this->hasMany(classes::class);
    }
}