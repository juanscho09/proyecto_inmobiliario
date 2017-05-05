<?php

use \App\Models\Propietario;
use \App\Models\Inquilino;
use \App\Models\Garante;

function instanciaTipoPersona($tipoPersona){
    switch($tipoPersona){
        case 'propietarios':
            $tipo_persona = new Propietario();
            break;
        case 'inquilinos':
            $tipo_persona = new Inquilino();
            break;
        case 'garantes':
            $tipo_persona = new Garante();
            break;
        default:
            $tipo_persona = '';
            break;
    }
    return $tipo_persona;
}