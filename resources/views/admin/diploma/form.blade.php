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

        <div class="form-group mb-2 mb20 col">
            <label for="parrafo_1" class="form-label">{{ __('Parrafo 1') }}</label>
            <textarea  name="parrafo_1" class="form-control @error('parrafo_1') is-invalid @enderror" id="parrafo_1" placeholder="Parrafo 1">{{ old('parrafo_1', $diploma?->parrafo_1) }}</textarea>
            {!! $errors->first('parrafo_1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20 col">
            <label for="parrafo_2" class="form-label">{{ __('Parrafo 2') }}</label>
            <textarea  name="parrafo_2" class="form-control @error('parrafo_2') is-invalid @enderror" id="parrafo_2" placeholder="Parrafo 2">{{ old('parrafo_2', $diploma?->parrafo_2) }}</textarea>
            {!! $errors->first('parrafo_2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>