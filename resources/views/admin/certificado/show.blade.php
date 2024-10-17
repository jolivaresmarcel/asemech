@extends('layouts.app')

@section('template_title')
    {{ $certificado->name ?? __('Show') . " " . __('Certificado') }}
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255); display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Certificado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('certificados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $certificado->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Es Valido:</strong>
                                    {{ $certificado->es_valido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Caducidad:</strong>
                                    {{ $certificado->fecha_caducidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Archivo:</strong>
                                    {{ $certificado->archivo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
