<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Año') }}
            {{ Form::text('ano_pe', $periodo->ano_pe, ['class' => 'form-control' . ($errors->has('ano_pe') ? ' is-invalid' : ''), 'placeholder' => 'Ano Pe']) }}
            {!! $errors->first('ano_pe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inicio Periodo') }}
            {{ Form::date('inicio_pe', $periodo->inicio_pe, ['class' => 'form-control' . ($errors->has('inicio_pe') ? ' is-invalid' : ''), 'placeholder' => 'Inicio Pe']) }}
            {!! $errors->first('inicio_pe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Termino Periodo') }}
            {{ Form::date('termino_Pe', $periodo->termino_Pe, ['class' => 'form-control' . ($errors->has('termino_Pe') ? ' is-invalid' : ''), 'placeholder' => 'Termino Pe']) }}
            {!! $errors->first('termino_Pe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Mensualidad Anual') }}
            {{ Form::text('montoanual', $periodo->montoanual, ['class' => 'form-control' . ($errors->has('montoanual') ? ' is-invalid' : ''), 'placeholder' => 'Montoanual']) }}
            {!! $errors->first('montoanual', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>