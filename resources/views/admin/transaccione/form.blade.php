<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="payment_id" class="form-label">{{ __('Payment Id') }}</label>
            <input type="text" name="payment_id" class="form-control @error('payment_id') is-invalid @enderror" value="{{ old('payment_id', $transaccione?->payment_id) }}" id="payment_id" placeholder="Payment Id">
            {!! $errors->first('payment_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="evento_id" class="form-label">{{ __('Evento Id') }}</label>
            <input type="text" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $transaccione?->evento_id) }}" id="evento_id" placeholder="Evento Id">
            {!! $errors->first('evento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $transaccione?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $transaccione?->status) }}" id="status" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status_detail" class="form-label">{{ __('Status Detail') }}</label>
            <input type="text" name="status_detail" class="form-control @error('status_detail') is-invalid @enderror" value="{{ old('status_detail', $transaccione?->status_detail) }}" id="status_detail" placeholder="Status Detail">
            {!! $errors->first('status_detail', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="create_payment" class="form-label">{{ __('Create Payment') }}</label>
            <input type="text" name="create_payment" class="form-control @error('create_payment') is-invalid @enderror" value="{{ old('create_payment', $transaccione?->create_payment) }}" id="create_payment" placeholder="Create Payment">
            {!! $errors->first('create_payment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="get_payment" class="form-label">{{ __('Get Payment') }}</label>
            <input type="text" name="get_payment" class="form-control @error('get_payment') is-invalid @enderror" value="{{ old('get_payment', $transaccione?->get_payment) }}" id="get_payment" placeholder="Get Payment">
            {!! $errors->first('get_payment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>