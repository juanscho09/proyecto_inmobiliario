<?php

namespace App\Models;

class Inquilino extends Modelo
{
    protected $table = "inquilinos";

    public static $rules = array();

    public static $messages = array();

    protected $fillable = array(
        'nombre',
        'apellido',
        'tipo_documento',
        'nro_documento',
        'cuil_cuit',
        'condicion_iva',
        'fecha_nacimiento',
        'telefono_1',
        'telefono_2',
        'telefono_3',
        'email',
        'banco',
        'nro_cuenta',
        'direccion',
        'cod_postal',
        'ciudad',
        'provincia',
        'pais',
        'notas',
        'contacto_1',
        'telefono_cont_1',
        'contacto_2',
        'telefono_cont_2',
        'contacto_3',
        'telefono_cont_3',
    );

    protected $hidden = array();
}

