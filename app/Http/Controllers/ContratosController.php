<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Contrato;

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
}
