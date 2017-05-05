<?php

namespace App\Models;

use DB;
use Eloquent;
use \Illuminate\Database\Eloquent\Builder;

class Modelo extends Eloquent {
    public $errors;

    /**
     *  Validacion de atributos definidos dentro del objeto
     * @param    bool $update Bandera para identificar si se va a realizar una actualizacion
     * @return    bool                true = OK, false = No paso la validacion
     */
    public function validate ($update = false) {
        //Inicializo las reglas y mensajes
        $rules    = static::$rules;
        $messages = static::$messages;

        //Si voy a actualizar agrego las variables unicas
        if ($update) {
            foreach ($rules as $ruleKey => $rule) {
                if (strpos($rule, "unique") !== false) {
                    $rules[$ruleKey] .= "," . $ruleKey . "," . $this->id;
                }

                if ($ruleKey === "password") {
                    $rules[$ruleKey] = "";
                }
            }
        }

        //Realizo la validacion
        $validator = \Validator::make($this->attributes, $rules, $messages);

        //Si la validacion fue correcta
        if ($validator->passes())
            return true;

        //Sino seteo los errores
        $this->errors = $validator->messages();
        return false;
    }

    /**
     *  Validacion de restricciones foreaneas que impidan la eliminacion del mismo
     * @return    bool    true = OK, false = No paso la validacion
     */
    public function validateConstraints () {
        //Inicializo las relaciones
        $constraints  = static::$constraints;
        $this->errors = null;
        $error        = false;

        //Para cada relacion del modelo
        foreach ($constraints as $constraintKey => $constraint) {
            //Si se tiene que realizar la validacion
            if ($constraint["validate"]) {

                //Busco registros que realizen la resticcion
                $result
                    = DB::table($constraintKey)
                    ->select(DB::raw("count(*) as count"))
                    ->where($constraint["id"], "=", $this->id)
                    ->get();

                //Valido errores
                if ($result[0]->count > 0) {
                    //Genero la bolsa de mensajes del Validator
                    if ($this->errors === null)
                        $this->errors = new \Illuminate\Support\MessageBag();

                    //Agrego el mensaje de error
                    $this->errors->add($constraintKey . ".relation_exists", $constraint["message"]);
                    $error = true;
                }
            }
        }

        return !$error;
    }

    public function newCollection (array $models = array()) {
        return new Coleccion($models);
    }

    // This array is used by models with composite keys.
    public static $compositeKey = [];
    // Get the value based on the composite key.
    // If non found, returns null.
    public static function compositeFind ($fields) {
        if (count(static::$compositeKey) < 2)
            throw new \Exception('Composite keys must have at least two fields');
        $where = [];
        foreach (static::$compositeKey as $key)
            $where[$key] = $fields[$key];
        return self::where($where)->first();
    }
    // Override parent's method, to use method save with composite keys.
    // More info: http://goo.gl/V6Gi0e
    protected function setKeysForSaveQuery(Builder $query) {
        if (count(static::$compositeKey) > 1) {
            foreach (static::$compositeKey as $key)
                $query->where($key, $this->original[$key]);
            return $query;
        } else
            return parent::setKeysForSaveQuery($query);
    }
}

