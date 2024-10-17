<br />
<div class="row padding-1 p-1">
    <div class="col-md-12">
    <div class="row">

    
        <div class="form-group mb-2 mb20 col">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $evento?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="lugar" class="form-label">{{ __('Lugar') }}</label>
            <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror" value="{{ old('lugar', $evento?->lugar) }}" id="lugar" placeholder="Lugar">
            {!! $errors->first('lugar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="valor" class="form-label">{{ __('Valor') }}</label>
            <input type="text" name="valor" class="form-control @error('valor') is-invalid @enderror" value="{{ old('valor', $evento?->valor) }}" id="valor" placeholder="Valor">
            {!! $errors->first('valor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
       

    
    </div>
    <div class="row">
    
        <div class="form-group mb-2 mb20 col">
            <label for="foto" class="form-label">{{ __('Foto') }}</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto', $evento?->foto) }}" id="foto" placeholder="Foto">
            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="inicio" class="form-label">{{ __('Fecha Inicio') }}</label>
            <input type="date" name="inicio" class="form-control @error('fecha inicio') is-invalid @enderror" value="{{ old('inicio', $evento?->inicio) }}" id="inicio" placeholder="Fecha Inicio">
            {!! $errors->first('inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="termino" class="form-label">{{ __('Fecha Termino') }}</label>
            <input type="date" name="termino" class="form-control @error('termino') is-invalid @enderror" value="{{ old('termino', $evento?->termino) }}" id="termino" placeholder="Fecha Termino">
            {!! $errors->first('termino', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 mb20 col">
            <label for="cupos" class="form-label">{{ __('Cupos') }}</label>
            <input type="text" name="cupos" class="form-control @error('cupos') is-invalid @enderror" value="{{ old('cupos', $evento?->cupos) }}" id="cupos" placeholder="Cupos">
            {!! $errors->first('cupos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="cupos_disponibles" class="form-label">{{ __('Cupos Disponibles') }}</label>
            <input type="text" name="cupos_disponibles" class="form-control @error('cupos_disponibles') is-invalid @enderror" value="{{ old('cupos_disponibles', $evento?->cupos_disponibles) }}" id="Cupos disponibles" placeholder="Cupos Disponibles">
            {!! $errors->first('cupos_disponibles', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="publicacion" class="form-label">{{ __('Fecha de Publicación') }}</label>
            <input type="date" name="publicacion" class="form-control @error('publicacion') is-invalid @enderror" value="{{ old('publicacion', $evento?->publicacion) }}" id="publicacion" placeholder="Fecha de Publicación">
            {!! $errors->first('publicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 mb20 col">
            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="Descripción">{{ old('descripcion', $evento?->descripcion) }}</textarea>

            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20 col">
            <label for="terminos" class="form-label">{{ __('Términos y Condiciones') }}</label>
            <textarea  name="terminos" class="form-control @error('terminos') is-invalid @enderror" id="terminos" placeholder="Términos y Condiciones">{{ old('terminos', $evento?->terminos) }}</textarea>
            {!! $errors->first('terminos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    
    </div>
    <div class="col-md-12 mt20 mt-2 text-right">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
    </div>
</div>