@extends('layouts.app')

@section('template_title')
    {{ $asistencia->name ?? __('Show') . " " . __('Asistencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asistencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Entrada Id:</strong>
                                    {{ $asistencia->entrada_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $asistencia->evento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $asistencia->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
