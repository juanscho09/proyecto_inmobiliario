<?php 

namespace App\Repository;

use App\Contracts\InmueblesInterface as InmueblesInt;
use App\Models\Inmueble as InmuebleModel;


class InmueblesManager implements InmueblesInt
{
	public function index()
	{
		$response = [];

        try {
            $response['inmuebles'] = [];
        } catch (Exception $ex) {

        }

        return $response;
	}

    public function show($id)
    {

    }

	public function create(InmuebleModel $inmueble)
	{

	}

    public function update(InmuebleModel $inmueble)
    {

    }

    public function delete(InmuebleModel $inmueble)
    {

    }
}