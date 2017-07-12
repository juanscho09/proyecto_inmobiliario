<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $casts = [ 'persona' => 'array' ];

    public function usuario()
    {
    	return $this->belongsTo(User::class);
    }

    public function tipo()
    {
    	return $this->belongsTo(TipoMovimiento::class);
    }
}
