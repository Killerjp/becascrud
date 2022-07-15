@extends('layouts.plantillabase2')

@section('template_title')
    Crear Postulante
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    <div class="card-header ">
                        <span class="card-title">Crear Postulante</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('postulants.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('postulant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
