@extends('layouts.plantillabase2')

@section('template_title')
    Update Grupof
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    <div class="card-header">
                        <span class="card-title">Actualizar Grupo Familiar</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupofs.index') }}"> Atras</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupofs.update', $grupof->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grupof.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
