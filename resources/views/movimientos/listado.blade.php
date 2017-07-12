@extends('layouts.app')

@section('htmlheader_title')
    Movimientos
@endsection

@section('contentheader_title')
    Movimientos
@endsection

@section('contentheader_description')
    Listado de movimientos
@endsection

@section('nav_movimientos')
    <li class="active treeview">
@endsection

@section('item_movimientos')
    <li class="active">
@endsection

@section("sectionScripts")

@endsection

@section("main-content")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Movimientos registrados
                            @include('partials._messages')
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    {{ Form::open( array('route'=> 'inmuebles.listado' , 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}

                                    <div class="form-group">
                                            
                                    {{ Form::label('', 'Filtrar Listado', array("for"=>"btnFiltrarListado") ) }}

                                        {{ Form::submit('Filtrar Listado',
                                                            [ 
                                                                "id" => "btnFiltrarListado",
                                                                "class" => "btn btn-info btn-block"
                                                            ] 
                                                        ) }}
                                    </div>

                                    {{ Form::close() }}

                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="">Nuevo movimiento</label>
                                        <a href="{{URL::route('inmuebles.create')}}">
                                            <button class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Registrar nuevo movimiento">
                                                <i class="fa fa-plus"></i>
                                           </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha</th>
                                                <th>Persona</th>
                                                <th>Tipo</th>
                                                <th>Monto</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($movimientos)
                                                @foreach ($movimientos as $movimiento)
                                                    <tr>
                                                        <th>{{ $movimiento->id }}</th>
                                                        <td>{{ $movimiento->fecha_movimiento }}</td>
                                                        <td>{{ $movimiento->persona['nombre'] }}</td>
                                                        <td>{{ $movimiento->tipo_movimiento }}</td>
                                                        <td>{{ $movimiento->monto }}</td>
                                                        
                                                        <td>
                                                            <a href="{{ route('movimientos.show', $movimiento->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                            
                      <a  href="{{ route('movimientos.edit', $movimiento->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No hay movimientos registrados
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        @if($movimientos->links())
                                        <div class="well">
                                          <div class="text-center">
                                            {!! $movimientos->links(); !!}
                                          </div>
                                        </div>                
                                        @endif                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection