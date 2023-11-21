<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            $user->validatePassword();
        });
    }

    public static function rules($id = null)
    {
        return [
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*[A-Z])(?=.*\d)/', // Memastikan minimal 1 huruf besar dan 1 angka
            ],
        ];
    }

    protected function validatePassword()
    {
        $validator = validator($this->attributes, self::rules($this->id));

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
