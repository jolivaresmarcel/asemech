<div class="row padding-1 p-1">
    <div class="col-md-12">
      
        
        <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $user->id }}" id="user_id" placeholder="User Id">
        <input type="hidden" name="es_valido" class="form-control @error('es_valido') is-invalid @enderror" value="-1" id="es_valido" placeholder="Es Valido">
        <input type="hidden" name="fecha_caducidad" class="form-control @error('fecha_caducidad') is-invalid @enderror" value="01/01/0001" id="fecha_caducidad" placeholder="Fecha Caducidad">
        {{-- <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Usuario') }}</label>
           
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="es_valido" class="form-label">{{ __('Es Valido') }}</label>
            
            {!! $errors->first('es_valido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        {{-- <div class="form-group mb-2 mb20">
            <label for="fecha_caducidad" class="form-label">{{ __('Fecha Caducidad') }}</label>
            
            {!! $errors->first('fecha_caducidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        <div class="form-group mb-2 mb20">
            <label for="archivo" class="form-label">{{ __('Archivo') }}</label>
            <input type="file" name="archivo" class="form-control @error('archivo') is-invalid @enderror" value="{{ old('archivo', $certificado?->archivo) }}" id="archivo" placeholder="Archivo">
            {!! $errors->first('archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>