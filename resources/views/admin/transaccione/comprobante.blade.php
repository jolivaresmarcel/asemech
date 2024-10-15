@extends('layouts.app')

@section('template_title')


{{header('Refresh: 5');}}

 
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Transacción</span>
                        </div>
                        
                    </div>
                    @foreach ($t as $transaccione)
                   

                

                    
                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Payment Id:</strong>
                                    {{ $transaccione->payment_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $transaccione->evento->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $transaccione->user->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $transaccione->status }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status Detail:</strong>
                                    {{ $transaccione->status_detail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Create Payment:</strong>
                                    {{ $transaccione->create_payment }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Get Payment:</strong>
                                    {{ $transaccione->get_payment }}
                                </div>
                                @if($transaccione->status=='pending')
                                <div class="form-group mb-2 mb20">
                    
                                <a class="btn btn-sm btn-danger " href="{{ route('transacciones.show', $transaccione->id) }}">{{ __('Actualizar estado de pago') }}</a>
                                </div>
                            @endif
        

                                
                                @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 