@extends('layouts.plantillabase2')

@section('template_title')
    {{ $postulant->name ?? 'Show Postulant' }}
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Postulant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rut Post:</strong>
                            {{ $postulant->rut_post }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Post:</strong>
                            {{ $postulant->nombre_post }}
                        </div>
                        <div class="form-group">
                            <strong>Periodo Id:</strong>
                            {{ $postulant->periodo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $postulant->users_id }}
                        </div>                        
                        <div class="form-group">
                            <strong>Curso Post:</strong>
                            {{ $postulant->curso_post }}
                        </div>
                        <div class="form-group">
                            <strong>Apod Post:</strong>
                            {{ $postulant->apod_post }}
                        </div>
                        <div class="form-group">
                            <strong>Correoapo Post:</strong>
                            {{ $postulant->correoapo_post }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento Post:</strong>
                            {{ $postulant->descuento_post }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
