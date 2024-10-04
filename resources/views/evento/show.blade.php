@extends('layouts.app')

@section('template_title')
    {{ $evento->name ?? __('Show') . " " . __('Evento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Evento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('eventos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $evento->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $evento->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Terminos:</strong>
                                    {{ $evento->terminos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Foto:</strong>
                                    {{ $evento->foto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Inicio:</strong>
                                    {{ $evento->inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Termino:</strong>
                                    {{ $evento->termino }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cupos:</strong>
                                    {{ $evento->cupos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pucbicar:</strong>
                                    {{ $evento->pucbicar }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lugar:</strong>
                                    {{ $evento->lugar }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor:</strong>
                                    {{ $evento->valor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
