<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Usuario') }}</label>
            {{-- <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $certificado?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!} --}}
            <select name="user_id" id="user" class="form-control">
                <option value="">Selección de usuario</option>
                @foreach ($user as $u)
                    <option value="{{ $u->id }}"
                        {{ old('user_id') == $u->id ? 'selected' : ($certificado->user_id == $u->id? 'selected' : '') }}>
                        {{ $u->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="es_valido" class="form-label">{{ __('Es Válido') }}</label>
            {{-- <input type="text" name="es_valido" class="form-control @error('es_valido') is-invalid @enderror" value="{{ old('es_valido', $certificado?->es_valido) }}" id="es_valido" placeholder="Es Valido"> --}}           
            <select name="es_valido" id="es_valido" class="form-control">
                <option value="" selected>Seleccionar una opción</option>
                <option value="0" {{ $certificado->es_valido == 0? 'selected' : '' }}>NO</option>
                <option value="1" {{ $certificado->es_valido == 1? 'selected' : '' }}>SI</option>
            </select>
           
            {!! $errors->first('es_valido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_caducidad" class="form-label">{{ __('Fecha Caducidad') }}</label>
            <input type="date" name="fecha_caducidad" class="form-control @error('fecha_caducidad') is-invalid @enderror" value="{{ old('fecha_caducidad', $certificado?->fecha_caducidad) }}" id="fecha_caducidad" placeholder="Fecha Caducidad">
            {!! $errors->first('fecha_caducidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
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