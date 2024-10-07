@extends('layouts.app')

@section('template_title')
    {{ $entradasEvento->name ?? __('Show') . " " . __('Entradas Evento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Entradas Evento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('entradas-eventos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $entradasEvento->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento</strong>
                                    {{ $entradasEvento->evento->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $entradasEvento->user->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Compra:</strong>
                                    {{ $entradasEvento->fecha_compra }}
                                </div>

                    </div>
                </div>
            </div>
        </div>

        
    </section>
@endsection
