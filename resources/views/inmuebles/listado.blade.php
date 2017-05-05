@extends('layouts.app')

@section('htmlheader_title')
    Listado
@endsection

@section('contentheader_title')
    Inmuebles
@endsection

@section('contentheader_description')

@endsection

@section('nav_main_inmuebles')
    <li class="active">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inmuebles registrados
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="padding-top: 10px; padding-bottom: 10px;">
                                <div class="container">
                                    <div class="row">
                                        {{ Form::open( array('route'=> 'inmuebles.listado' , 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}

                                        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                                            <div class="form-group">
                                                {{ Form::label('', 'Filtrar Listado', array("for"=>"btnFiltrarListado") ) }}
                                                {{
                                                    Form::submit('Filtrar Listado',
                                                        array(
                                                            "id" => "btnFiltrarListado",
                                                            "class" => "btn btn-info btn-block"
                                                        )
                                                    )
                                                }}
                                            </div>
                                        </div>

                                        {{ Form::close() }}

                                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                            <div class="form-group">
                                                {{ Form::label('nuevoRegistro', 'Nuevo Inmueble') }}
                                                <a href="{{URL::route('inmuebles.create')}}">
                                                    <button class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Nuevo registro">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Apellido y nombre</th>
                                    <th>Tipo y Nro Documento</th>
                                    <th>CUIL/CUIT</th>
                                    <th>IVA</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(0 != 0)
                                    @foreach ($inmuebles as $inmueble)
                                        <tr>
                                            <td>{{ $inmueble->apellido . ', ' . $inmueble->nombre }}</td>
                                            <td>{{ $inmueble->tipo_documento . ' - ' . $inmueble->nro_documento }}</td>
                                            <td>{{ $inmueble->cuil_cuit }}</td>
                                            <td>{{ $inmueble->condicion_iva }}</td>
                                            <td>{{ $inmueble->email }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No hay inmuebles registrados</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection