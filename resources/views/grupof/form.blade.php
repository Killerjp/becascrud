<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
        {{ Form::label('id_postulant') }}
            {{ Form::text('id_postulant',$postulanteid, $grupof->id_postulant, ['class' => 'form-control' . ($errors->has('id_postulant') ? ' is-invalid' : ''), 'placeholder' => 'Id Postulant']) }}
            {!! $errors->first('id_postulant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        {{ Form::label('id_user') }}
            {{ Form::text('id_user',$user_id, $grupof->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        {{ Form::label('periodo') }}
            {{ Form::text('periodo',$date, $grupof->periodo, ['class' => 'form-control' . ($errors->has('periodo') ? ' is-invalid' : ''), 'placeholder' => 'Periodo']) }}
            {!! $errors->first('periodo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_gf') }}
            {{ Form::text('nombre_gf', $grupof->nombre_gf, ['class' => 'form-control' . ($errors->has('nombre_gf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Gf']) }}
            {!! $errors->first('nombre_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rut_gf') }}
            {{ Form::text('rut_gf', $grupof->rut_gf, ['class' => 'form-control' . ($errors->has('rut_gf') ? ' is-invalid' : ''), 'placeholder' => 'Rut Gf']) }}
            {!! $errors->first('rut_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edad_gf') }}
            {{ Form::text('edad_gf', $grupof->edad_gf, ['class' => 'form-control' . ($errors->has('edad_gf') ? ' is-invalid' : ''), 'placeholder' => 'Edad Gf']) }}
            {!! $errors->first('edad_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parentesco_gf') }}
            {{ Form::text('parentesco_gf', $grupof->parentesco_gf, ['class' => 'form-control' . ($errors->has('parentesco_gf') ? ' is-invalid' : ''), 'placeholder' => 'Parentesco Gf']) }}
            {!! $errors->first('parentesco_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('profesion_gf') }}
            {{ Form::text('profesion_gf', $grupof->profesion_gf, ['class' => 'form-control' . ($errors->has('profesion_gf') ? ' is-invalid' : ''), 'placeholder' => 'Profesion Gf']) }}
            {!! $errors->first('profesion_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ingresos_gf') }}
            {{ Form::text('ingresos_gf', $grupof->ingresos_gf, ['class' => 'form-control' . ($errors->has('ingresos_gf') ? ' is-invalid' : ''), 'placeholder' => 'Para calcular los ingresos liquidos reales y de una manera justa para todos, considere el Total de Haberes menos los Descuentos Legales (AFP,Salud,impuestos)']) }}
            {!! $errors->first('ingresos_gf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('adjuntar documentacion comprimida en rar o en un solo pdf, word, jpg ') }}
            {{ Form::file('documento', $grupof->documento, ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : ''), 'placeholder' => 'Hola']) }}
            {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>