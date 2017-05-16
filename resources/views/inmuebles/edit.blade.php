@extends('layouts.app')

@section('htmlheader_title')
    Crear
@endsection

@section('contentheader_title')
    Inmueble
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ Form::open( array('route'=>'inmuebles.update', 'method'=>'PUT', 'onsubmit'=>'return setData();')) }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar inmueble
                        </div>
                        <fieldset>
                            <legend style="padding-left: 25px;">Propietario del Inmueble</legend>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;" width="40%">
                                                {{ Form::label('inmueble_propietario_1', 'Propietario 1') }}
                                            </td>
                                            <td>
                                                <select name="inmueble_propietario_1" id="inmueble_propietario_1" class="form-control">
                                                    <option value="">Elegir un propietario</option>
                                                    @foreach( $propietarios as $propietario )
                                                        <option value="{{ $propietario->id }}">{{ $propietario->apellido . ', ' . $propietario->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('inmueble_propietario_2', 'Propietario 2') }}
                                            </td>
                                            <td>
                                                <select name="inmueble_propietario_2" id="inmueble_propietario_2" class="form-control">
                                                    <option value="">Elegir un propietario</option>
                                                    @foreach( $propietarios as $propietario )
                                                        <option value="{{ $propietario->id }}">{{ $propietario->apellido . ', ' . $propietario->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend style="padding-left: 25px">Datos de Inmueble</legend>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;" width="25%">
                                                {{ Form::label('tipo_inmueble', 'Tipo Inmueble') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;" width="25%">
                                                {{
                                                    Form::text(
                                                    'tipo_inmueble',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('observacion', 'Observación') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'observacion',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('calle', 'Calle') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'calle',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td colspan="2" class="text-center" style="line-height:35px;">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" style="line-height:35px;">{{ Form::label('numero', 'Número') }}</td>
                                                            <td class="text-center" style="line-height:35px;">
                                                                {{
                                                                    Form::text(
                                                                    'numero',
                                                                    null,
                                                                    array(
                                                                        'class' => 'form-control'
                                                                        )
                                                                    )
                                                                }}
                                                            </td>
                                                            <td class="text-center" style="line-height:35px;">{{ Form::label('piso', 'Piso') }}</td>
                                                            <td class="text-center" style="line-height:35px;">
                                                                {{
                                                                    Form::text(
                                                                    'piso',
                                                                    null,
                                                                    array(
                                                                        'class' => 'form-control'
                                                                        )
                                                                    )
                                                                }}
                                                            </td>
                                                            <td class="text-center" style="line-height:35px;">{{ Form::label('depto', 'Depto') }}</td>
                                                            <td class="text-center" style="line-height:35px;">
                                                                {{
                                                                    Form::text(
                                                                    'depto',
                                                                    null,
                                                                    array(
                                                                        'class' => 'form-control'
                                                                        )
                                                                    )
                                                                }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('localidad', 'Localidad') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'localidad',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('cod_postal', 'CP') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'cod_postal',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend style="padding-left: 25px">Datos del Administrador</legend>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_nombre', 'Administrador') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_nombre',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_cta_banco', 'Cta. Bancaria') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_cta_banco',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_tel_1', 'Teléfono 1') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_tel_1',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_email', 'Email') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_email',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_tel_2', 'Teléfono 2') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_tel_2',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_domicilio', 'Domicilio') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_domicilio',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_tel_3', 'Teléfono 3') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_tel_3',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('administrador_cp', 'CP') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'administrador_cp',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend style="padding-left: 25px">Datos del Encargado</legend>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('encargado', 'Encargado') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'encargado',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('encargado_tel_2', 'Teléfono 2') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'encargado_tel_2',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('encargado_tel_1', 'Teléfono 1') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'encargado_tel_1',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{ Form::label('encargado_tel_3', 'Teléfono 3') }}
                                            </td>
                                            <td class="text-center" style="line-height:35px;">
                                                {{
                                                    Form::text(
                                                    'encargado_tel_3',
                                                    null,
                                                    array(
                                                        'class' => 'form-control'
                                                        )
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block btn-sm']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection