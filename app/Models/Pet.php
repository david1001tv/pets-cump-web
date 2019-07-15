<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['user_id', 'name', 'photo', 'toy', 'food', 'music', 'play', 'bio'];

    protected $relations = ['user'];

    public function getRelations()
    {
        return $this->relations;
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
