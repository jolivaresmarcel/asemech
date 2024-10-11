@extends('layouts.app')

@section('template_title')
    {{ $entradasEvento->name ?? __('Show') . " " . __('Entradas Evento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('entradas-eventos.index') }}"> {{ __('Back') }}</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Datos de entrada</span>
                        </div>
                        
                    </div>

                    
                    <div class="card-body bg-white">
                        
                                
                                <div class="form-group mb-3 mb20">
                                    <strong>Evento</strong>
                                    {{ $entradasEvento->evento->titulo }}
                                </div>
                                <div class="form-group mb-3 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $entradasEvento->user->nombre .' '. $entradasEvento->user->paterno }}
                                </div>
                                <div class="form-group mb-3 mb20">
                                    <strong>Rut:</strong>
                                    {{ $entradasEvento->user->rut }}
                                </div>
                                <div class="form-group mb-3 mb20">
                                    <strong>Fecha Compra:</strong>
                                    {{ $entradasEvento->fecha_compra }}
                                </div>

                    </div>




                </div>
            </div>
                <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">QR de validación</span>
                        </div>
                  
                    </div>

                    
                    <div class="card-body bg-white">
                        
                             

                                <div class="form-group mb-2 mb20 text-center">
                                    {!! QrCode::size(150)->generate(Request::root()."/valida/". $entradasEvento->id ) !!}
                                    {{-- $entradasEvento->fecha_compra --}}
                                </div>

                    </div>




                </div>

            </div>
        </div>

        
    </section>
@endsection
