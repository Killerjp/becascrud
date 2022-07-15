@extends('layouts.plantillabase2')

@section('template_title')
    Update Gasto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Gasto</span>
                    </div>
                    <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gastos.index') }}"> Atras</a>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gastos.update', $gasto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('gasto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
