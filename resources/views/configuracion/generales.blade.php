@extends('layouts.app')

@section('htmlheader_title')
    Configuración
@endsection

@section('contentheader_title')
    Configuración
@endsection

@section('contentheader_description')
    Configuraciones generales
@endsection

@section('nav_configuracion')
    <li class="active treeview">
@endsection

@section('item_configuracion_generales')
    <li class="active">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Configuraciones generales

                </div>
                <div class="panel-body">
                    @if($generales->count())
                        @foreach($generales as $general)

                        @endforeach
                    @else
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta</h4>
                            No existen configuraciónes generales cargadas en la base datos
                        </div>
                    @endif
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>

@endsection
