@extends('layouts.app')

@section('template_title')
    {{ $compra->name ?? __('Show') . " " . __('Compra') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('compras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $compra->evento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $compra->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado Id:</strong>
                                    {{ $compra->estado_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Compra Id:</strong>
                                    {{ $compra->tipo_compra_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Archivo:</strong>
                                    {{ $compra->archivo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
