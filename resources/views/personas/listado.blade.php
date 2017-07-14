@extends('layouts.app')

@section('htmlheader_title')
    Listado
@endsection

@section('contentheader_title')
    {{ ucwords($tipoPersona) }}
@endsection

@section('contentheader_description')

@endsection

@section('nav_personas')
    <li class="active treeview">
@endsection

@section('item_'.$tipoPersona)
    <li class="active">
@endsection

@section("sectionScripts")

@endsection

@section("main-content")

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ ucfirst($tipoPersona) }} registrados
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                        {{ Form::open( array('route'=>array('personas.listado', $tipoPersona), 'method'=>'get', 'onsubmit'=>'return true;', "style" => "margin:0px;")) }}
                            <div class="form-group">
                                {{ Form::label('', 'Filtrar Listado', array("for"=>"btnFiltrarListado") )}}
                                    {{ Form::submit('Filtrar Listado', [
                                        "id" => "btnFiltrarListado",
                                        "class" => "btn btn-info btn-block"
                                      ])}}
                            </div>
                        {{ Form::close() }}
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                        <div class="form-group">
                         <!-- en el label, uso las funciones de string, para sacar la ultima letra de la palabra, ya que viene en plural el tipo de usuario,
                        y en productor no, ya que tendria que quitarle las dos ultimas letras-->
                            {{ Form::label('nuevoRegistro', 'Nuevo '.ucwords(substr($tipoPersona,0,strlen($tipoPersona)-1))) }}
                            <a href="{{URL::route('personas.create', $tipoPersona)}}">
                                <button class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="Nuevo registro">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                            @if($personas->count() != 0)
                                @foreach ($personas as $persona)
                                <tr>
                                    <td>{{ $persona->apellido . ', ' . $persona->nombre }}</td>
                                    <td>{{ $persona->tipo_documento . ' - ' . $persona->nro_documento }}</td>
                                    <td>{{ $persona->cuil_cuit }}</td>
                                    <td>{{ $persona->condicion_iva }}</td>
                                    <td>{{ $persona->email }}</td>
                                    <td>
                                        <a href="{{ route('personas.show', ['tipoPersona'=>$tipoPersona,'id'=>$persona->id])}}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a  href="{{ route('personas.edit', ['tipoPersona'=>$tipoPersona,'id'=>$persona->id])}}" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                            <tr>
                                                <td colspan="6" class="text-center">No hay {{ $tipoPersona }} registrados</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-4 col-md-offset-1">
                                        <center>
                                            <small class="text-muted">
                                                Mostrando
                                                @if( $personas->count() == 0)
                                                    {{ '0' }}
                                                @else
                                                    {{ ( $personas->perPage() * ( $personas->currentPage() - 1 ) ) + 1 }}
                                                @endif
                                                -
                                                @if( ( $personas->perPage() * $personas->currentPage() ) <= $personas->total())
                                                    {{ ( $personas->perPage() * $personas->currentPage() ) }}
                                                @else
                                                    {{ $personas->total() }}
                                                @endif
                                                de
                                                {{ $personas->total() }}
                                                {{ ucwords($tipoPersona) }}
                                            </small>
                                        </center>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $personas->appends(Input::except(array('page')))->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
@endsection