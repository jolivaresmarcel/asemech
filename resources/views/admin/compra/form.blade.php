<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento Id') }}</label>
            <input type="text" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $compra?->evento_id) }}" id="evento_id" placeholder="Evento Id">
            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $compra?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_id" class="form-label">{{ __('Estado Id') }}</label>
            <input type="text" name="estado_id" class="form-control @error('estado_id') is-invalid @enderror" value="{{ old('estado_id', $compra?->estado_id) }}" id="estado_id" placeholder="Estado Id">
            {!! $errors->first('estado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_compra_id" class="form-label">{{ __('Tipo Compra Id') }}</label>
            <input type="text" name="tipo_compra_id" class="form-control @error('tipo_compra_id') is-invalid @enderror" value="{{ old('tipo_compra_id', $compra?->tipo_compra_id) }}" id="tipo_compra_id" placeholder="Tipo Compra Id">
            {!! $errors->first('tipo_compra_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="archivo" class="form-label">{{ __('Archivo') }}</label>
            <input type="text" name="archivo" class="form-control @error('archivo') is-invalid @enderror" value="{{ old('archivo', $compra?->archivo) }}" id="archivo" placeholder="Archivo">
            {!! $errors->first('archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>