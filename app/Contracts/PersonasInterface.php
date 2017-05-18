<?php
namespace App\Contracts;

interface PersonasInterface
{
    /*public function index();

    public function show($id);

    public function create(array $inmueble);

    public function update(InmuebleModel $inmueble);

    public function delete(InmuebleModel $inmueble);*/


    public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));

}
