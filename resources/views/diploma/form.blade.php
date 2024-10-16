<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento Id') }}</label>
            <input type="text" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $diploma?->evento_id) }}" id="evento_id" placeholder="Evento Id">
            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fondo" class="form-label">{{ __('Fondo') }}</label>
            <input type="text" name="fondo" class="form-control @error('fondo') is-invalid @enderror" value="{{ old('fondo', $diploma?->fondo) }}" id="fondo" placeholder="Fondo">
            {!! $errors->first('fondo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $diploma?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="es_borrable" class="form-label">{{ __('Es Borrable') }}</label>
            <input type="text" name="es_borrable" class="form-control @error('es_borrable') is-invalid @enderror" value="{{ old('es_borrable', $diploma?->es_borrable) }}" id="es_borrable" placeholder="Es Borrable">
            {!! $errors->first('es_borrable', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>