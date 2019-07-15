<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['name'];

    protected $relations = ['users'];

    public function getRelations()
    {
        return $this->relations;
    }

    public function city()
    {
        return $this->hasMany(User::class);
    }
}
