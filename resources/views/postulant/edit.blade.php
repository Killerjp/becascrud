@extends('layouts.plantillabase2')

@section('template_title')
    Update Postulant
@endsection

@section('content')<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 ">

                @includeif('partials.errors')

                <div class="card card-default shadow mt-4">
                    
                    <div class="card-header">
                        <span class="card-title">Update Postulant</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>
                    
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('postulants.update', $postulant->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rut Postulante') }}
            {{ Form::text('rut_post' , $postulant->rut_post, ['class' => 'form-control' . ($errors->has('rut_post') ? ' is-invalid' : ''), 'placeholder' => 'Rut Post']) }}
            {!! $errors->first('rut_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre Postulante') }}
            {{ Form::text('nombre_post', $postulant->nombre_post, ['class' => 'form-control' . ($errors->has('nombre_post') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Post']) }}
            {!! $errors->first('nombre_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>       

        <div class="form-group">
            {{ Form::label('Periodo') }}
            {{ Form::select('periodo_id', $period , $postulant->periodo_id, ['class' => 'form-control' . ($errors->has('periodo_id') ? ' is-invalid' : ''), 'placeholder' => 'Periodo Id']) }}
            {!! $errors->first('periodo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
           
            {{ Form::hidden('users_id', $postulant->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Curso') }}
            {{ Form::select('curso_post',$cursos, $postulant->curso_post, ['class' => 'form-control' . ($errors->has('curso_post') ? ' is-invalid' : ''), 'placeholder' => 'Curso Post']) }}
            {!! $errors->first('curso_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre Apoderado') }}
            {{ Form::text('apod_post', $postulant->apod_post, ['class' => 'form-control' . ($errors->has('apod_post') ? ' is-invalid' : ''), 'placeholder' => 'Apod Post']) }}
            {!! $errors->first('apod_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo Apoderado') }}
            {{ Form::text('correoapo_post', $postulant->correoapo_post, ['class' => 'form-control' . ($errors->has('correoapo_post') ? ' is-invalid' : ''), 'placeholder' => 'Correoapo Post']) }}
            {!! $errors->first('correoapo_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tuvo Descuento este año') }}
            {{ Form::select('descuento_post',$descuentos, $postulant->descuento_post, ['class' => 'form-control' . ($errors->has('descuento_post') ? ' is-invalid' : ''), 'placeholder' => 'Descuento Post']) }}
            {!! $errors->first('descuento_post', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
