<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Contrato;
use App\Models\Propietario;
use App\Models\Inquilino;
use App\Models\Inmueble;

class ContratosController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$contratos = Contrato::paginate(10);

    	return view('contratos.listado', compact('contratos'));
    }

    public function create()
    {
    	$inmuebles = Inmueble::with('propietarios')->get();

    	return view('contratos.create', compact('inmuebles'));
    }
}
