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
                                    <strong>Tipo entrada</strong>
                                    {{ $entradasEvento->tiposEntrada->descripcion }}
                                </div>
                               

                    </div>




                </div>
            </div>
                

         </div>

         <div class="card-body bg-white">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                                                      
                        <th >Actividad</th>
                        <th >Fecha</th>
                        <th >Lugar</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividade)
                            <tr>
                         
                            <td >{{ $actividade->descripcion }}</td>
                            <td >{{ $actividade->fecha }}</td>
                            <td >{{ $actividade->lugar }}</td>

                                <td>
                                    @php $tieneRegistro=0 @endphp
                                    @if($participacion->count()>0)
                                        @foreach ($participacion as $p)
                                            @if($p->actividad_id==$actividade->id)
                                            @php $tieneRegistro=1 @endphp
                                            @endif
                                        @endforeach

                                        @if($tieneRegistro==1)
                                                <div class="float-right">                                                                  
                                                    <a class="btn btn-danger btn-sm" href="#"> {{ __('Asistencia registrada') }}</a>
                                                </div>
                                            @else
                                                <div class="float-right">                                                                  
                                                    <a class="btn btn-primary btn-sm" href="/RegistraAsistencia/{{$entradasEvento->id}}/{{$actividade->id}}"> {{ __('Registrar asistencia') }}</a>
                                                </div>
                                            @endif

                                    @else                               
                                        <div class="float-right">                                                                  
                                            <a class="btn btn-primary btn-sm" href="/RegistraAsistencia/{{$entradasEvento->id}}/{{$actividade->id}}"> {{ __('Registrar asistencia') }}</a>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

        
    </section>
@endsection
