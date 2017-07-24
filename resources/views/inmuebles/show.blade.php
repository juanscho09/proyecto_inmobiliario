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
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-xs-12">
                        <h2> <small> Direccion:</small>  <strong> {{$inmueble->calle}} {{$inmueble->numero }}</strong> </h2>    
                    </div>
                </div>                
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <ul>
                            <li class="items">Piso: {{$inmueble->piso }} - Depto {{$inmueble->depto }}</li>
                            <li class="divider"></li>
                            
                            <li class="items">Observaciones:  {{isset($inmueble->observaciones) ? $inmueble->observaciones : ' -'}}</li>
                            
                            
                        </ul>        
                    </div>                    
                    <div class="col-xs-6">
                        <ul>
                            <li class="items">Localidad:  {{$inmueble->localidad }}</li>
                            <li class="divider"></li>
                            <li class="items">CP: {{$inmueble->cod_postal}}</li>
                            <li class="divider"></li>
                            <li class="items">Tipo inmueble: 
                            {{isset($inmueble->tipo_inmueble) ? $inmueble->tipo_inmueble : '-'}}
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-3">
                        <h4 class="text-center"><strong>Administrador</strong></h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-3">
                        <img src="{{asset('img/person.png')}}" alt="" class="img-responsive thumbnail">
                    </div>
                    <div class="col-xs-9">
                        <ul>
                            <li class="items">Nombre : {{$inmueble->administrador_nombre}}</li>
                            <li class="divider"></li>
                            <li class="items">Domicilio: {{$inmueble->administrador_domicilio}}</li>
                            <li class="divider"></li>
                            <li class="items">Telefono: {{$inmueble->administrador_tel_1}}</li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>    
            <!--
           <div class="panel panel-default">
            <div class="panel-heading">
                <h3> <small> Direccion:</small>  {{$inmueble->calle}} {{$inmueble->numero }} - {{$inmueble->localidad }} </h3>
            </div>
            <div class="panel-content">
            
            </div> 
                <div class="panel-footer">
                        
                            
                </div>
            </div>-->
        </div>
        <div class="col-xs-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3><strong>Propietario</strong> </h3>
                </div>
                <div class="box-body">
                    Nombre: {{ isset($inmueble->propietario) ? $inmueble->propietario : '-' }}
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-primary btn-block">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                     Editar inmueble</button>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-danger btn-block"
                     data-toggle="modal" data-target="#myModal"> 
                    <i class="fa fa-trash" aria-hidden="true"></i>
                     Eliminar inmueble</button>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Confirmar</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Desea eliminar este inmueble</p>
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-xs-6">
                                      <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    <div class="col-xs-6">
                                  {!! Form::open(['route' => ['inmuebles.destroy', $inmueble->id], 'method' => 'DELETE']) !!}
                                    {{ Form::button('Eliminar', array('class'=>'btn btn-danger btn-block', 'type'=>'submit'))}}
                                  {!! Form::close() !!}
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
            </div>
            

        </div>
    </div>
    <style>
        ul{
            list-style: none;
        }
        .items{
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
@endsection