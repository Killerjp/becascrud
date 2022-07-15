@extends('layouts.plantillabase2')

@section('template_title')
    Update Periodo
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    <div class="card-header">
                        <span class="card-title">Actualizar Periodo</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('periodos.index') }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('periodos.update', $periodo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('periodo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
