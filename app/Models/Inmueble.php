<?php
namespace App\Models;

class Inmueble extends Modelo{

    protected $table = "inmuebles";

    public static $rules = array();

    public static $messages = array();

    protected $fillable = array(

    );

    protected $hidden = array();
}