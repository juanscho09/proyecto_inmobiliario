@extends('layouts.app')

@section('htmlheader_title')
    Configuración
@endsection

@section('contentheader_title')
    Configuración
@endsection

@section('contentheader_description')
    Configuraciones impuestos / servicios
@endsection

@section('nav_configuracion')
    <li class="active treeview">
@endsection

@section('item_configuracion_servicios')
    <li class="active">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Impuestos / Servicios y períodos de cobro
                </div>
                <div class="panel-body">
                    @if($servicios->count())
                        <div class="row">
                            <div class="col-md-3">
                                <strong class="text-center">Nombre servicio</strong>
                            </div>
                            <div class="col-md-5">
                                <strong class="text-center">Descripción</strong>
                            </div>
                            <div class="col-md-2">
                                <strong class="text-center">Valor mensual (0 varía)</strong>
                            </div>
                            <div class="col-md-2">
                                <strong class="text-center">Acciones</strong>
                            </div>
                        </div>
                        @foreach($servicios as $servicio)

                            {!! Form::model($servicio,
                                   ['route' => ['configuracion.generales.update', $servicio->id], 'method' => 'PUT' ]) !!}
                                <div class="row">
                                    <div class="col-md-3">
                                        {{  Form::text( 'titulo', null,
                                            array('class' => 'form-control') ) }}
                                    </div>
                                    <div class="col-md-5">
                                        {{  Form::text( 'descripcion', null,
                                            array('class' => 'form-control') ) }}
                                    </div>
                                    <div class="col-md-2">
                                        {{  Form::text( 'valor', null,
                                             array('class' => 'form-control') ) }}
                                    </div>
                                    <div class="col-md-2">
                                        {{ Form::submit('Actualizar', ['class' => 'btn btn-success btn-block btn-sm']) }}
                                    </div>
                                </div>
                            <br>

                            {{ Form::close() }}
                        @endforeach
                    @else
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta</h4>
                            No existen configuraciones de servicios cargados en la base datos
                        </div>
                    @endif
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>

@endsection
