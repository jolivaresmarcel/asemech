@extends('layouts.app')

@section('template_title')
    {{ $diploma->name ?? __('Show') . " " . __('Diploma') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('diplomas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento Id:</strong>
                                    {{ $diploma->evento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fondo:</strong>
                                    {{ $diploma->fondo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $diploma->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Es Borrable:</strong>
                                    {{ $diploma->es_borrable }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
