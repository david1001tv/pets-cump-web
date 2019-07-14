<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';

    protected $hidden = ['created_at', 'updated_at', 'password'];

    protected $fillable = ['login', 'email', 'phone', 'password', 'f_name', 'l_name', 'address', 'city', 'bio', 'is_confirmed', 'is_admin'];

    protected $relations = ['city', 'adverts', 'pets', 'volunteer'];

    public function getRelations()
    {
        return $this->relations;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function volunteer()
    {
        return $this->hasMany(AdvertVolunteer::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_admin' => $this->is_admin
        ];
    }
}
