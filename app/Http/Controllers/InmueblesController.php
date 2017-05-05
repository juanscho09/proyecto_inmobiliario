<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use DB;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Input;
use View;

class InmueblesController extends Controller
{

    public function  listado()
    {
        $response = [];

        try {
            $response['inmuebles'] = [];
        } catch (Exception $ex) {

        }

        return View::make("inmuebles.listado")->with($response);
    }

    public function create(){
        $response = [];

        $propietarios = Propietario::all();

        $response['propietarios'] = $propietarios;
        return View::make("inmuebles.create")->with($response);
    }

    public function store(){
        $response = [];

        return Route::redirect("inmuebles.listado")->with($response);
    }

}