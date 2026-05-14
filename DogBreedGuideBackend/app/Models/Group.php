<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    // Egy csoportnak több kutyafajtája lehet
    public function types()
    {
        return $this->hasMany(Type::class, 'group_id', 'id');
    }
}
