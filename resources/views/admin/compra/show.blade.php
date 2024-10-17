@extends('layouts.app')

@section('template_title')
    {{ $compra->name ?? __('Show') . " " . __('Compra') }}
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255); display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-light btn-sm" href="{{ route('compras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Evento:</strong>
                                    {{ $compra->evento->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Usuario:</strong>
                                    {{ $compra->user->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rut:</strong>
                                    {{ $compra->user->rut }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    @switch($compra->estado_id)
                                    @case(1) Pendiente de pago  @break
                                    @case(2) Pago realizado @break
                                    @case(3) Falla de transacción @break
                                    @case(4) El pago fue cancelado @break
                                    @default Sin información
                                @endswitch
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Compra:</strong>
                                    {{ $compra->tiposcompra->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>comprobante:</strong>
                                    @if ($compra->archivo =="")
                                    <a class="btn btn-sm btn-success" href="/comprobante/{{ $compra->id}}"><i class="fa fa-fw fa-edit"></i> {{ __('Ver') }}</a>
                                        {{-- {{ $compra->tiposcompra->descripcion }} --}}
                                    @else
                                     <a href="/{{$compra->archivo}}">Descargar</a>
                                     @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
