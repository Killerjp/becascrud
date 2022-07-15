@extends('layouts.plantillabase2')

@section('template_title')
    {{ $periodo->name ?? 'Show Periodo' }}
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Periodo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('periodos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ano Pe:</strong>
                            {{ $periodo->ano_pe }}
                        </div>
                        <div class="form-group">
                            <strong>Inicio Pe:</strong>
                            {{ $periodo->inicio_pe }}
                        </div>
                        <div class="form-group">
                            <strong>Termino Pe:</strong>
                            {{ $periodo->termino_Pe }}
                        </div>
                        <div class="form-group">
                            <strong>Montoanual:</strong>
                            {{ $periodo->montoanual }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
