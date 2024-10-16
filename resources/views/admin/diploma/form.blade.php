<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento') }}</label>
            {{-- <input type="text" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $diploma?->evento_id) }}" id="evento_id" placeholder="Evento Id">
             --}}
             <select name="evento_id" id="evento" class="form-control">
                <option value="">Selección de eventos</option>
                
                @foreach ($evento as $e)           
                    <option value="{{ $e->id }}"
                        {{ old('evento_id') == $e->id ? 'selected' : ($diploma->evento_id == $e->id ? 'selected' : '' )}}>
                        {{ $e->titulo }}</option>                 
                @endforeach
            </select>
            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fondo" class="form-label">{{ __('Imagen de fondo') }}</label>
            <input type="file" name="fondo" class="form-control @error('fondo') is-invalid @enderror" value="{{ old('fondo', $diploma?->fondo) }}" id="fondo" placeholder="Fondo">
            {!! $errors->first('fondo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $diploma?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>