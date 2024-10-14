@extends('layouts.app')

@section('template_title')
    {{ $participacione->name ?? __('Show') . " " . __('Participacione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Participacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('participaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $participacione->evento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Actividad Id:</strong>
                                    {{ $participacione->actividad_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $participacione->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $participacione->fecha }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
