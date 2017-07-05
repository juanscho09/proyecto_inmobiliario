<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Movimiento;

class MovimientosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$movimientos = Movimiento::all();

    	return view('movimientos.listado', compact('movimientos'));
    }
}
