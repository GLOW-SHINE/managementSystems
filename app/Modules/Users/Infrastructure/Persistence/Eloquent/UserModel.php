<?php

namespace App\Modules\Users\Infrastructure\Persistence\Eloquent;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class UserModel extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'users';
    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'username',
        'password',
        'picture',
        'bio',
        'token',
        'status',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];





}