@extends('layouts.plantillabase2')

@section('template_title')
    {{ $gasto->name ?? 'Show Gasto' }}
@endsection

@section('content')
@secre (session('status'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Gasto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Postulant:</strong>
                            {{ $gasto->id_postulant }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Dg:</strong>
                            {{ $gasto->nombre_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Monto Dg:</strong>
                            {{ $gasto->monto_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Observ Dg:</strong>
                            {{ $gasto->observ_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Documento Dg:</strong>
                            <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gasto->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsecre
@admin (session('status'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Gastos Declarados Admin</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gasto.index',$gasto->id_postulant) }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Postulant:</strong>
                            {{ $gasto->id_postulant }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Dg:</strong>
                            {{ $gasto->nombre_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Monto Dg:</strong>
                            {{ $gasto->monto_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Observ Dg:</strong>
                            {{ $gasto->observ_dg }}
                        </div>
                        <div class="form-group">
                            <strong>Documento Dg:</strong>
                            {{ $gasto->documento_dg }}
                        </div>

                    </div>

                   
                </div>
            </div>
        </div>
    </section>
    @endadmin
    @endsection
