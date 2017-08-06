<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Movimiento;
use App\Repository\MovimientosManager as RepMovimientos;

class MovimientosController extends Controller
{
    protected $movimientosrepo;
    protected $response;

    public function __construct(RepMovimientos $repMovimientos)
    {
        $this->movimientosrepo = $repMovimientos;
        $this->response = [];
        $this->middleware('auth');
    }

    public function index()
    {
        $this->response['movimientos'] = $this->movimientosrepo->paginate(10);
    	//$movimientos = Movimiento::paginate(10);
    	return view('movimientos.listado', $this->response);
    }
}
