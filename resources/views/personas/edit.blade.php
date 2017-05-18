@extends('layouts.app')

@section('htmlheader_title')
    Edita
@endsection

@section('contentheader_title')
    {{ ucwords($tipoPersona) }}
@endsection

@section('contentheader_description')

@endsection

@section('nav_personas')
    <li class="active treeview" >
@endsection

@section('item_'.$tipoPersona)
    <li class="active">
@endsection

@section('sectionScripts')
    {{ HTML::script("js/pages/personas/create.js") }}
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ Form::open( array('route'=>'personas.store', 'method'=>'POST', 'onsubmit'=>'return setData();')) }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Crear Nuevo
                        </div>
                            <fieldset>
                                <legend style="margin-left: 5px;">Datos Personales</legend>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('nombre', 'Nombre') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'nombre',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('telefono_1', 'Teléfono 1') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_1',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('direccion', 'Dirección') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'direccion',
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
                                                    {{ Form::label('apellido', 'Apellido') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'apellido',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('telefono_2', 'Teléfono 2') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_2',
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
                                                <td>
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
                                            <tr>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('nro_documento', 'Nro Documento') }}
                                                </td>
                                                <td>
                                                    <div class="form-inline">
                                                        {{
                                                            Form::select(
                                                            'tipo_documento',
                                                            [
                                                                'DNI' => 'DNI',
                                                                'LC' => 'LC',
                                                                'LE' => 'LE',
                                                                'CI' => 'CI',
                                                                'PASAPORTE' => 'PASAPORTE',
                                                            ],
                                                            null,
                                                            [
                                                                'id' => 'tipo_documento',
                                                                'class' => 'form-control'
                                                            ]
                                                            )
                                                        }}
                                                        {{
                                                            Form::input(
                                                            'number',
                                                            'nro_documento',
                                                            null,
                                                            array(
                                                                'class' => 'form-control'
                                                                )
                                                            )
                                                        }}
                                                    </div>
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('telefono_3', 'Teléfono 3') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_3',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('ciudad', 'Ciudad') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'ciudad',
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
                                                    {{ Form::label('cuil_cuit', 'CUIL/CUIT') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'cuil_cuit',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('email', 'Email') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'email',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('provincia', 'Provincia') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'provincia',
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
                                                    {{ Form::label('condicion_iva', 'Condicion IVA') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::select(
                                                        'condicion_iva',
                                                        [
                                                            'Responsable Inscripto' => 'Responsable Inscripto',
                                                            'Responsable No Inscripto' => 'Responsable No Inscripto',
                                                            'No Responsable' => 'No Responsable',
                                                            'Exento' => 'Exento',
                                                            'Consumidor Final' => 'Consumidor Final',
                                                            'Responsable Monotributo' => 'Responsable Monotributo',
                                                            'No Categorizado' => 'No Categorizado'
                                                        ],
                                                        null,
                                                        [
                                                            'id' => 'condicion_iva',
                                                            'class' => 'form-control'
                                                        ]
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('banco', 'Banco') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'banco',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('pais', 'País') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'pais',
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
                                                    {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'fecha_nacimiento',
                                                        null,
                                                        array(
                                                            'class' => 'form-control datepicker',
                                                            'placeholder'   =>	'DD/MM/YYYY',
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('nro_cuenta', 'Nro Cuenta') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'nro_cuenta',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">

                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('notas', 'Notas') }}
                                                </td>
                                                <td colspan="5">
                                                    {{
                                                        Form::textarea(
                                                            'notas',
                                                            null,
                                                            [
                                                                'class' => 'form-control'
                                                            ]
                                                        )
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend style="margin-left: 5px;">Personas de Contacto</legend>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('contacto_1', 'Contacto 1') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'contacto_1',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('contacto_2', 'Contacto 2') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'contacto_2',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('contacto_3', 'Contacto 3') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::text(
                                                        'contacto_3',
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
                                                    {{ Form::label('telefono_cont_1', 'Teléfono') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_cont_1',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('telefono_cont_2', 'Teléfono') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_cont_2',
                                                        null,
                                                        array(
                                                            'class' => 'form-control'
                                                            )
                                                        )
                                                    }}
                                                </td>
                                                <td class="text-center" style="line-height:35px;">
                                                    {{ Form::label('telefono_cont_3', 'Teléfono') }}
                                                </td>
                                                <td>
                                                    {{
                                                        Form::input(
                                                        'number',
                                                        'telefono_cont_3',
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
                                </div>
                            </fieldset>
                        {{ Form::hidden('tipoPersona', $tipoPersona) }}
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