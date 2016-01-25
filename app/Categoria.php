<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
