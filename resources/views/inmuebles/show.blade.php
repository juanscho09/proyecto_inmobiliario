@extends('layouts.app')

@section('htmlheader_title')
    Crear
@endsection

@section('contentheader_title')
    Inmueble
@endsection

@section('contentheader_description')

@endsection

@section('nav_main_inmuebles')
    <li class="active">
@endsection

@section('main-content')
   
<div class="row">
    <div class="col-xs-12">
               
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> <small> Direccion:</small>  {{$inmueble->calle}} {{$inmueble->numero }} - {{$inmueble->localidad }} </h3>
            </div>
            <div class="panel-content">
            
            </div> 
                <div class="panel-footer">
                        
                            
                </div>
            </div>
        </div>
    </div>
        
@endsection