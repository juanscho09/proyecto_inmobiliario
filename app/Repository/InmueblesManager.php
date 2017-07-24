<?php 

namespace App\Repository;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;



class InmueblesManager extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        // TODO: Implement model() method.
        return "App\\Models\\Inmueble";
    }
}