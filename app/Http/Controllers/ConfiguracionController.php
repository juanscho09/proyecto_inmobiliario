<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracion;
use App\Http\Requests;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $configuraciones = Configuracion::all();

    	return view('configuracion.listado',
                    compact('configuraciones'));
    }
}
