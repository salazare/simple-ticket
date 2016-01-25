<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = array('titulo', 'descripcion', 'categoria_id','estado_id','user_id',
    'operador_id', 'operador_at');
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function operador()
    {
        return $this->belongsTo(User::class,'operador_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
