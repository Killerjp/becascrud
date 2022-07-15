<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_c') }}
            {{ Form::text('nombre_c', $curso->nombre_c, ['class' => 'form-control' . ($errors->has('nombre_c') ? ' is-invalid' : ''), 'placeholder' => 'Nombre C']) }}
            {!! $errors->first('nombre_c', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>