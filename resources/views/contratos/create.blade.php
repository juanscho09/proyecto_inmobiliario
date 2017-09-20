@extends('layouts.app')

@section('htmlheader_title')
    Contratos
@endsection

@section('contentheader_title')
    Contratos
@endsection

@section('contentheader_description')
    Creación de contratos
@endsection

@section('nav_contratos')
    <li class="active treeview">
@endsection

@section('item_contratos')
    <li class="active">
        @endsection

        @section('main-content')

            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="box box-primary">
                        {{ Form::open( ['route'=>'contratos.store', 'method'=>'POST', 'onsubmit'=>'return setData();']) }}
                        <div class="box-header with-border">
                            Creación de contratos
                        </div>
                        <div class="box-body">
                             
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inmueble">Seleccione inmueble</label>
                                        <select class="form-control" name="inmueble" id="inmueble">
                                            @foreach($inmuebles as $inmueble)
                                                <option value="$inmueble->id">{{$inmueble->calle}} - {{$inmueble->numero }} - {{$inmueble->localidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Seleccione inquilino</label>
                                        <select class="form-control" name="inquilino1" id="inquilino1">
                                            @foreach($inmuebles as $inmueble)
                                                <option value="$inmueble->id">{{$inmueble->calle}} - {{$inmueble->numero }} - {{$inmueble->localidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Comienzo contrato</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Finalización</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Monto primer Año</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Monto segundo año</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Garante 1</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Garante 2</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Garante 3</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Garante 4</label>
                                        <input class="form-control" id="" name="" type="text">
                                    </div>
                                </div>
                            </div>
                            
                            
                                    
                        </div>
                        <div class="box-footer with-border">
                            <div class="row">
                                <div class="col-xs-6 col-md-4 col-md-offset-1">
                                    {{ Form::button('Volver', ['class' => 'btn btn-danger btn-block btn-sm']) }}        
                                </div>
                                <div class="col-xs-6 col-md-4 col-md-offset-2">
                                    {{ Form::submit('Finalizar contrato', ['class' => 'btn btn-success btn-block btn-sm']) }}        
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

@endsection
