@extends('layouts.app')

@section('template_title')
    {{ $entradasEvento->name ?? __('Show') . " " . __('Entradas Evento') }}
@endsection

@section('content')
<br />
    <section class="content container-fluid">
        
        @if ($message = Session::get('error'))
        <div class="alert alert-danger m-4">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <p>{{ $message }}</p>
        </div>
        @endif


    @if ($message = Session::get('success'))
    <div class="alert alert-success m-4">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <p>{{ $message }}</p>
       
      </div>
    </div>
@endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    

                    <div class="card-body bg-success">
                        
                     
                        <div class="form-group mb-3 mb20 text-center bg-error">
                            LA ENTRADA ES VALIDA 
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
                                @if($entradasEvento->validada==1)
                                <div class="float-right">                                                                  
                                    <a class="btn btn-danger btn-sm" href="#"> {{ __('Asistencia registrada') }}</a>
                                </div>
                                @else
                                <div class="float-right">                                                                  
                                    <a class="btn btn-success btn-sm" href="/RegistraAsistencia/{{$entradasEvento->id}}"> {{ __('Marcar asistencia') }}</a>
                                </div>
                                @endif

                    </div>




                </div>
            </div>
                

            </div>
        </div>

        
    </section>
@endsection
