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
                             @include('partials._messages')
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    {{ Form::open( array('route'=> 'inmuebles.listado' , 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}

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
                                        <label for="">Nuevo inmueble</label>
                                        <a href="{{URL::route('inmuebles.create')}}">
                                            <button class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Nuevo registro">
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
                                                <th>Dirección</th>
                                                <th>Piso/Depto</th>
                                                <th>Localidad</th>
                                                <th>Propietario</th>
                                                <th>Tipo</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($inmuebles)
                                                @foreach ($inmuebles as $inmueble)
                                                    <tr>
                                                        <th>{{ $inmueble->id }}</th>
                                                        <td>{{ $inmueble->calle . ' ' . $inmueble->numero }}</td>
                                                        <td>{{ $inmueble->piso . ' - ' . $inmueble->depto }}</td>
                                                        <td>{{ isset($inmueble->localidad) ? $inmueble->localidad : '-' }}</td>
                                                        <td>{{ isset($inmueble->propietario) ? $inmueble->propietario  : '-' }}</td>
                                                        <td>{{ isset($inmueble->tipo_inmueble) ? $inmueble->tipo_inmueble : '-' }}</td>
                                                        <td>
                                                            <a href="{{ route('inmuebles.show', $inmueble->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                            
                      <a  href="{{ route('inmuebles.edit', $inmueble->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No hay inmuebles registrados
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        @if($inmuebles->links())
                                        <div class="well">
                                          <div class="text-center">
                                            {!! $inmuebles->links() !!}
                                          </div>
                                        </div>                
                                        @endif                
                                    </div>
                                </div>
                            </div>
                        
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