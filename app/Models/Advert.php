<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = 'adverts';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['user_id', 'cost', 'food_cost', 'is_processed'];

    protected $relations = ['volunteers'];

    public function getRelations()
    {
        return $this->relations;
    }

    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'adverts_volunteers', 'advert_id', 'user_id');
    }
}
