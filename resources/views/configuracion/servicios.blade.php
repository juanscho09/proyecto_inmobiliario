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

@section('item_configuraciones_servicios')
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
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre servicio</th>
                                                <th>Descripción</th>
                                                <th>Valor mensual (0 varía)</th>
                                                <th>Plazo de pago (en meses)</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($servicios as $servicio)
                                                <tr>
                                                    {!! Form::model($servicio,
                                                        ['route' => ['configuracion.generales.update', $servicio->id], 'method' => 'PUT' ]) !!}

                                                        <td>
                                                            {{  Form::text( 'titulo', null,
                                                                array('class' => 'form-control') ) }}
                                                        </td>
                                                        <td>
                                                            {{  Form::text( 'descripcion', null,
                                                                array('class' => 'form-control') ) }}
                                                        </td>
                                                        <td>
                                                            {{  Form::text( 'valor', null,
                                                                 array('class' => 'form-control') ) }}
                                                        </td>
                                                        <td>
                                                            {{  Form::text( 'plazo_pago', null,
                                                                 array('class' => 'form-control') ) }}
                                                        </td>
                                                        <td>
                                                            {{ Form::submit('Actualizar', ['class' => 'btn btn-success btn-block btn-sm']) }}
                                                        </td>
                                                    {{ Form::close() }}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




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
