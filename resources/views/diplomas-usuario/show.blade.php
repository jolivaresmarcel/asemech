@extends('layouts.app')

@section('template_title')
    {{ $diplomasUsuario->name ?? __('Show') . " " . __('Diplomas Usuario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Diplomas Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('diplomas-usuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $diplomasUsuario->evento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $diplomasUsuario->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Diploma Id:</strong>
                                    {{ $diplomasUsuario->diploma_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nota:</strong>
                                    {{ $diplomasUsuario->nota }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Asistencia:</strong>
                                    {{ $diplomasUsuario->asistencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Publicado:</strong>
                                    {{ $diplomasUsuario->publicado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
