<?php 
namespace App\Contracts;

use App\Models\Inmueble as InmuebleModel;

interface InmueblesInterface
{
    public function index();

    public function show($id);

	public function create(InmuebleModel $inmueble);

    public function update(InmuebleModel $inmueble);

    public function delete(InmuebleModel $inmueble);

}
