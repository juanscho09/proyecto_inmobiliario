<?php

namespace App\Models;

class Coleccion extends \Illuminate\Database\Eloquent\Collection
{

    /**
     *  Ordena la coleccion mediante el string de atributos que se especifico
     *
     *  La cadena que identifica el atributo puede ir accediendo gerarquicamente en el objeto mediante el simbolo .
     *  @param      string  $attributes     Cadena contenedora del atributo mediante el cual ordenar
     *  @param      string  $order          Tipo de ordenamiento [asc, desc]
     *  @return     [type]                  [description]
     */
    public function orderBy($attributes, $order 	=	"asc"){

        $attributes 	=	str_replace(".", "|", $attributes);

        $this->sortBy(function($model) use ($attributes) {
            //Hago el explode de atributos separados por .
            $attributes = explode("|", $attributes);

            //Me voy metiendo adentor por atributos
            foreach ($attributes as $attributeKey => $attribute) {
                $model 	=	$model[$attribute];
            }
            return $model;
        });

        if ($order == 'desc') {
            $this->items = array_reverse($this->items);
        }

        return $this;

    }


    public function filterBy($attributes, $value){
        $attributes     =   str_replace(".", "|", $attributes);
        $attributes     =   explode("|", $attributes);

        foreach ($this->items as $itemsKey => $item) {
            //Me voy metiendo adentor por atributos
            foreach ($attributes as $attributeKey => $attribute) {
                $item  =   $item[$attribute];
            }

            if($item != $value){
                unset($this->items[$itemsKey]);
            }

        }

        return $this;
    }

}

