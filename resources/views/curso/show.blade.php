@extends('layouts.plantillabase2')

@section('template_title')
    {{ $curso->name ?? 'Show Curso' }}
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre C:</strong>
                            {{ $curso->nombre_c }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
