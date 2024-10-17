<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $diplomasUsuario?->user_id) }}" id="user_id" placeholder="User Id"> 
        <input type="hidden"  name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $diplomasUsuario?->evento_id) }}" id="evento_id" placeholder="Evento Id">
        <input type="hidden" name="diploma_id" class="form-control @error('diploma_id') is-invalid @enderror" value="{{ old('diploma_id', $diplomasUsuario?->diploma_id) }}" id="diploma_id" placeholder="Diploma Id">        
        <input type="hidden" name="publicado" class="form-control @error('publicado') is-invalid @enderror" value="{{ old('publicado', $diplomasUsuario?->publicado) }}" id="publicado" placeholder="Publicado">
        {{-- <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento') }}</label>
            
            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User') }}</label>
            
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="diploma_id" class="form-label">{{ __('Diploma') }}</label>
             
            {!! $errors->first('diploma_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
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

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>