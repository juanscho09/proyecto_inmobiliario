<?php


function setModelTipoPersona($repoPersona, $tipoPersona){
    switch($tipoPersona){
        case 'propietarios':
            $repoPersona->setModel("App\\Models\\Propietario");
            break;
        case 'inquilinos': //Inquilino es el modelo por defecto
            $repoPersona;
            break;
        case 'garantes':
            $repoPersona->setModel("App\\Models\\Garante");
            break;
        default:
            $repoPersona;
            break;
    }
    return $repoPersona;
}