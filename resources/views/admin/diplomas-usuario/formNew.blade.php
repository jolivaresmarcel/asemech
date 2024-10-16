<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento') }}</label>

            <select name="evento_id" id="evento" class="form-control">
                <option value="">Selección de eventos</option>
                
                @foreach ($evento as $e)
   
                                               
                    <option value="{{ $e->id }}"
                        {{ old('evento_id') == $e->id ? 'selected' : ($diplomasUsuario->evento_id == $e->id ? 'selected' : '' )}}>
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
                @foreach ($eventoEntradas as $u)
                    <option value="{{ $u->user_id }}"
                        {{ old('user_id') == $u->user_id ? 'selected' : ($diplomasUsuario->user_id == $u->user_id? 'selected' : '') }}>
                        {{ $u->user->name }}</option>
                @endforeach
            </select>

            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="diploma_id" class="form-label">{{ __('Diploma') }}</label>
            {{-- <input type="text" name="diploma_id" class="form-control @error('diploma_id') is-invalid @enderror" value="{{ old('diploma_id', $diplomasUsuario?->diploma_id) }}" id="diploma_id" placeholder="Diploma Id"> --}}
            <select name="diploma_id" id="diploma" class="form-control">
                <option value="">Selección de usuario</option>
                @foreach ($diploma as $u)
                    <option value="{{ $u->id }}"
                        {{ old('diploma_id') == $u->id ? 'selected' : ($diplomasUsuario->diploma_id == $u->id? 'selected' : '') }}>
                        {{ $u->descripcion }}</option>
                @endforeach
            </select>
            {!! $errors->first('diploma_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nota" class="form-label">{{ __('Nota') }}</label>
            <input type="text" name="nota" class="form-control @error('nota') is-invalid @enderror" value="{{ old('nota', $diplomasUsuario?->nota) }}" id="nota" placeholder="Nota">
            {!! $errors->first('nota', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="asistencia" class="form-label">{{ __('Asistencia') }}</label>
            <input type="text" name="asistencia" class="form-control @error('asistencia') is-invalid @enderror" value="{{ old('asistencia', $diplomasUsuario?->asistencia) }}" id="asistencia" placeholder="Asistencia">
            {!! $errors->first('asistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="fecha_compra" class="form-label">{{ __('Fecha Compra') }}</label>
            
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}

        <input type="hidden" name="fecha_compra" class="form-control @error('fecha_compra') is-invalid @enderror" value="01-01-2024" id="fecha_compra" placeholder="Fecha Compra">

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>