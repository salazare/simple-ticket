<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nombre'];

    function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
