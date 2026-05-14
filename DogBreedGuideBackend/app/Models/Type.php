<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Kikapcsoljuk a tömeges adatbeviteli védelmet (minden mező írható)
    protected $guarded = [];
}
