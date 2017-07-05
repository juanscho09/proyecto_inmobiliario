@extends('layouts.app')

@section('htmlheader_title')
    Crear
@endsection

@section('contentheader_title')
    {{ ucwords($tipoPersona) }}
@endsection

@section('contentheader_description')

@endsection

@section('nav_main_personas')
    <li class="active">
@endsection

@section('main-content')
   
<div class="row">
    <div class="col-xs-12">
               
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>
                    <small>{{$persona->nombre}}:</small>
                </h3>
            </div>
            <div class="panel-content">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" style="background-color: gray" height="100" width="100" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{$persona->nombre}} {{$persona->apellido}}</h4>

                    Tipo Documento : {{$persona->tipo_documento}} Documento: {{ $persona->nro_documento }} CUIL/CUIT:  {{$persona->cuil_cuit}} <br>
                    Fecha Nacimiento: {{$persona->fecha_nacimiento}} <br>
                    Ciudad: {{$persona->ciudad}} - CP: {{$persona->cod_postal  }} <br>
                    Fecha Nacimiento: {{Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d-m-Y i')}} <br>
                    Telefono 1: {{$persona->telefono_1}} <br>
                    Telefono 2: {{$persona->telefono_1}} <br>
                    Telefono 3: {{$persona->telefono_3}} <br>

                  </div>
                </div>
            </div> 
                <div class="panel-footer">
                        
                      {{ $persona }}      
                </div>
            </div>
        </div>
    </div>
        
@endsection