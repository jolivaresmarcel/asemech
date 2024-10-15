<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tipo_entrada_id" class="form-label">{{ __('Tipo entrada') }}</label>
            {{-- <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $entradasEvento?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!} --}}


            <select name="tipo_entrada_id" id="tipo_entrada_id" class="form-control">
                <option value="">Selección el tipo de entrada</option>
                
                @foreach ($tipo_entrada as $t)
   
                                               
                    <option value="{{ $t->id }}"
                        {{ old('tipo_entrada_id') == $t->id ? 'selected' : ($entradasEvento->tipo_entrada_id == $t->id ? 'selected' : '' )}}>
                        {{ $t->descripcion }}</option>
                 
                @endforeach
            </select>

            {!! $errors->first('tipo_entrada_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

        </div>
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento') }}</label>

            <select name="evento_id" id="evento" class="form-control">
                <option value="">Selección de eventos</option>
                
                @foreach ($evento as $e)
   
                                               
                    <option value="{{ $e->id }}"
                        {{ old('evento_id') == $e->id ? 'selected' : ($entradasEvento->evento_id == $e->id ? 'selected' : '' )}}>
                        {{ $e->titulo }}</option>
                 
                @endforeach
            </select>


            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User') }}</label>
            {{-- <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $entradasEvento?->user_id) }}" id="user_id" placeholder="User Id"> --}}
            <select name="user_id" id="user" class="form-control">
                <option value="">Selección de usuario</option>
                @foreach ($user as $u)
                    <option value="{{ $u->id }}"
                        {{ old('user_id') == $u->id ? 'selected' : ($entradasEvento->user_id == $u->id? 'selected' : '') }}>
                        {{ $u->name }}</option>
                @endforeach
            </select>

            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
       

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar entrada') }}</button>
    </div>
</div>