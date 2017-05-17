<?php 

namespace App\Repository;

use App\Contracts\InmueblesInterface as InmueblesInt;
use App\Models\Inmueble as InmuebleModel;
use DB;


class InmueblesManager implements InmueblesInt
{
	public function index()
	{
		$response = InmueblesInt::all();

        return $response;
	}

    public function show($id)
    {

    }

	public function create(array $data)
	{
        $success = null;

        DB::beginTransaction();

        try {
            $inmueble = new InmuebleModel;
            $inmueble->fill($data);
            $inmueble->save();
            DB::commit();

            //TODO : relacionar con sync los propietarios(many to many)
            $success = true;

        } catch(Exception $ex) {
            DB::rollback();

            //TODO :log errors

            $success = false;
        }

        return $success;

	}

    public function update(InmuebleModel $inmueble)
    {

    }

    public function delete(InmuebleModel $inmueble)
    {

    }
}