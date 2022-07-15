@extends('layouts.plantillabase2')

@section('template_title')
    Create Grupof
@endsection

@section('content')<br>
@secre (session('status'))
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    <div class="card-header">
                        <span class="card-title">Crear Grupo Familiar</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupofs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grupof.form')

                        </form>
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

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    <div class="card-header">
                        <span class="card-title">Crear Grupo Familiar admin</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gf.index','$grupof->id_postulant') }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupofs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grupof.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endadmin
@endsection
