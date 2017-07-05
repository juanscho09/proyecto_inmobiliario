<?php
namespace App\Models;

class Inmueble extends Modelo{

    protected $table = "inmuebles";

    public static $rules = array();

    public static $messages = array();

    protected $fillable = array(
            'tipo_inmueble',
            'observacion',
            'calle',
            'numero',
            'piso',
            'depto',
            'localidad',
            'cod_postal',
            'administrador_nombre',
            'administador_cta_banco',
            'administrador_tel_1',
            'administrador_tel_2',
            'administrador_tel_3',
            'administrador_domicilio',
            'administrador_cp',
            'encargado',
            'encargado_tel_1',
            'encargado_tel_2',
            'encargado_tel_3'
    );

    protected $hidden = array();

    public function propietarios()
    {
        return $this->belongsToMany('App\Models\Propietario');
    }

    public function inquilino()
    {
        return $this->hasOne(Inquilino::class);
    }
}