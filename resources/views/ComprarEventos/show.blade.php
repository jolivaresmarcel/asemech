@extends('layouts.app')

@section('template_title')
    {{ $evento->name ?? __('Show') . " " . __('Evento') }}
@endsection

@section('content')
<br />
    <section class="content container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success m-4">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger m-4">
        <p>{{ $message }}</p>
    </div>
@endif

        <a class="m-2" href="{{ route('ComprarEventos.index') }}">Eventos></a>{{$evento->titulo}}
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card" style="background-color: #757C88; color:white;">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title"><h1>{{ strtoupper($evento->titulo) }}</h1></span>
                        </div>                                              
                    </div>
                    <div class="row ml-0 mr-0">                       
                         <div class="card-body bg-white col-md-6">
                            <img width="100%" src="/{{ $evento->foto }}" />
                        </div>
                        <div class="card-body bg-white col-md-6">
                            
                                   
                                    
                                    <div class="form-group mb-2 mb20">
                                        <strong>Descripcion:</strong>
                                        {{ $evento->descripcion }}
                                    </div>                                   
                                    <div class="form-group mb-2 mb20">
                                        <strong>Inicio:</strong>
                                        {{ $evento->inicio }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Termino:</strong>
                                        {{ $evento->termino }}
                                    </div>
                                    {{-- <div class="form-group mb-2 mb20">
                                        <strong>Cupos:</strong>
                                        {{ $evento->cupos }}
                                    </div> 
                                    <div class="form-group mb-2 mb20">
                                        <strong>Publicación:</strong>
                                        {{ $evento->pucbicar }}
                                    </div>--}}
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
        </div>
        <div class="card-body bg-white col-md-12">
            <strong>Términos y condiciones:</strong>
            <br />
            {{ $evento->terminos }}
        </div>
        <div class="float-right">
            {{-- @if($entradasevento->count()==0) --}}
            <a class="btn btn-success" href="/comprar/{{$evento->id}}/{{Auth::user()->id}}">Comprar entrada</a>
            {{-- @endif --}}
        </div>
    </section>
@endsection
