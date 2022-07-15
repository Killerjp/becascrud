@extends('layouts.plantillabase2')

@section('template_title')
    {{ $grupof->name ?? 'Ver Grupo Familiar' }}
@endsection

@section('content')<br>
@secre (session('status'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Grupo Familiar</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Postulant:</strong>
                            {{ $grupof->id_postulant }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Gf:</strong>
                            {{ $grupof->nombre_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Rut Gf:</strong>
                            {{ $grupof->rut_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Edad Gf:</strong>
                            {{ $grupof->edad_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Parentesco Gf:</strong>
                            {{ $grupof->parentesco_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Profesion Gf:</strong>
                            {{ $grupof->profesion_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Ingresos Gf:</strong>
                            {{ $grupof->ingresos_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $grupof->documento }}
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
                            <span class="card-title">Ver Grupo Familiar Admin</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gf.index',$grupof->id_postulant) }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Postulant:</strong>
                            {{ $grupof->id_postulant }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Gf:</strong>
                            {{ $grupof->nombre_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Rut Gf:</strong>
                            {{ $grupof->rut_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Edad Gf:</strong>
                            {{ $grupof->edad_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Parentesco Gf:</strong>
                            {{ $grupof->parentesco_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Profesion Gf:</strong>
                            {{ $grupof->profesion_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Ingresos Gf:</strong>
                            {{ $grupof->ingresos_gf }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $grupof->documento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endadmin
@endsection
