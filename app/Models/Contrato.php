<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    public function garantes()
    {
        return $this->belongsToMany(Garante::Class);
    }

    public function propietarios()
    {
        return $this->belongsToMany(Propietario::Class);
    }
}
