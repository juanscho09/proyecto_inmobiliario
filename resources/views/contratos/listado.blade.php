@extends('layouts.app')

@section('htmlheader_title')
    Contratos
@endsection

@section('contentheader_title')
    Contratos
@endsection

@section('contentheader_description')
    Listado de contratos
@endsection

@section('nav_contratos')
    <li class="active treeview">
@endsection

@section('item_contratos')
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
                            Contratos registrados
                            @include('partials._messages')
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    {{ Form::open( array('route'=> 'contratos.listado' , 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}

                                    <div class="form-group">
                                            
                                    {{ Form::label('', 'Filtrar Listado', array("for"=>"btnFiltrarListado") ) }}
                                        {{                                                 Form::submit('Filtrar Listado',
                                                        array(
                                                            "id" => "btnFiltrarListado",
                                                            "class" => "btn btn-info btn-block"
                                                        )
                                                    )
                                                }}
                                    </div>

                                    {{ Form::close() }}

                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="">Nuevo Contrato</label>
                                        <a href="{{URL::route('contratos.create')}}">
                                            <button class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Nuevo contrato">
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
                                                <th>Fecha Inicio</th>
                                                <th>Fecha exp.</th>
                                                <th>Dirección inmueble</th>
                                                <th>Propietario</th>
                                                <th>Inquilinos</th>
                                                <th>Monto actual</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($contratos)
                                                @foreach ($contratos as $contrato)
                                                    <tr>
                                                        <th>{{ $contrato->id }}</th>
                                                        <td>{{ $contrato->calle . ' ' . $contrato->fecha_inicio }}</td>
                                                        <td>{{ $contrato->fecha_expiracion }}</td>
                                                        <td>{{ $contrato->inmueble->direccion }}</td>
                                                        <td>{{ $contrato->inmueble->propietario->nombre }}</td>
                                                        <td>
                                                            @foreach($contrato->inquilinos as $inquilino)
                                                            
                                                            {{ $inquilino->nombre }}

                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ $contrato->monto_primer_año }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('contratos.show', $contrato->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

                      <a  href="{{ route('contratos.edit', $contrato->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No hay contratos registrados
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        @if($contratos->links())
                                        <div class="well">
                                          <div class="text-center">
                                            {!! $contratos->links(); !!}
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