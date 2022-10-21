<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_postulant') }}
            {{ Form::text('id_postulant',$postulanteid, $gasto->id_postulant, ['class' => 'form-control' . ($errors->has('id_postulant') ? ' is-invalid' : ''), 'placeholder' => 'Id Postulant']) }}
            {!! $errors->first('id_postulant', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_dg') }}
            {{ Form::text('nombre_dg', $gasto->nombre_dg, ['class' => 'form-control' . ($errors->has('nombre_dg') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Dg']) }}
            {!! $errors->first('nombre_dg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto_dg') }}
            {{ Form::text('monto_dg', $gasto->monto_dg, ['class' => 'form-control' . ($errors->has('monto_dg') ? ' is-invalid' : ''), 'placeholder' => 'Monto Dg']) }}
            {!! $errors->first('monto_dg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observ_dg') }}
            {{ Form::text('observ_dg', $gasto->observ_dg, ['class' => 'form-control' . ($errors->has('observ_dg') ? ' is-invalid' : ''), 'placeholder' => 'Observ Dg']) }}
            {!! $errors->first('observ_dg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('adjuntar documentacion comprimida en rar o en un solo pdf, word, jpg') }}
            {{ Form::file('documento_dg', $gasto->documento_dg, ['class' => 'form-control' . ($errors->has('documento_dg') ? ' is-invalid' : ''), 'placeholder' => 'Documento Dg']) }}
            {!! $errors->first('documento_dg', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>



