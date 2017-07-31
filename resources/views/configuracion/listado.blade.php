@extends('layouts.app')

@section('htmlheader_title')
    Configuración
@endsection

@section('contentheader_title')
    Configuración
@endsection

@section('contentheader_description')
    Parámetros globales del sistema
@endsection

@section('nav_main_configuracion')
    <li class="active">
@endsection

@section('main-content')
   
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Configuracion General   
                </div>
                <div class="box-body">
                    
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

@section('scripts')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection