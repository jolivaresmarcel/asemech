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

        <a class="m-2" href="{{ route('eventos.index') }}">Eventos |</a>{{$evento->titulo}}

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card" style="background-color: #efefef; color:rgb(61, 61, 61);">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="text-center"><h2>{{ $evento->titulo }}</h1></span>
                        </div>                                              
                    </div>
                    <div class="row ml-0 mr-0">                       
                         <div class="card-body bg-white col-md-6">
                            <img width="100%" src="/{{ $evento->foto }}" />
                        </div>
                        <div class="card-body bg-white col-md-6">
                                                             
                                    <div class="form-group mb-2 mb20">
                                        <strong>Fecha de inicio:</strong>
                                        {{ $evento->inicio }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Fecha de termino:</strong>
                                        {{ $evento->termino }}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <strong>Cupos:</strong>
                                        {{ $evento->cupos }}
                                    </div> 
                                    <div class="form-group mb-2 mb20">
                                        <strong>Cupos disponibles:</strong>
                                        {{ $evento->cupos_disponibles }}
                                    </div> 
                                    <div class="form-group mb-2 mb20">
                                        <strong>Publicación:</strong>
                                        {{ $evento->publicacion }}
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
        </div>

        <div class="card-body bg-white col-md-12 mt-1">
            <strong>Descripción:</strong>
            <br />
            {{ $evento->descripcion }} 
        </div>  
 
        <div class="card-body bg-white col-md-12 mt-3">
            <strong>Términos y condiciones:</strong>
            <br />
            {{ $evento->terminos }}
        </div>
        <br />
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
    
                                <span id="card_title">
                                    {{ __('Actividades') }}
                                </span>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success m-4">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    <div class="card-body bg-white col-md-12 mt-1">
             
                        <form method="POST" action="{{ route('actividades.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
       
                            <div class="col-4">
                                <div class="form-group mb-2 mb20">
                                    <input type="hidden" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror" value="{{ old('evento_id', $evento?->id) }}" id="evento_id" placeholder="Evento Id">
                                    <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
                                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"  id="descripcion" placeholder="Descripcion">
                                    {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group mb-2 mb20">
                                    <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
                                    <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" id="fecha" placeholder="Fecha">
                                    {!! $errors->first('fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="form-group mb-2 mb20">
                                    <label for="lugar" class="form-label">{{ __('Lugar') }}</label>
                                    <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror" id="lugar" placeholder="Lugar">
                                    {!! $errors->first('lugar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>
                              </div>
                             
                
                        </div>
                
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="col-md-12 mt20 mt-2">
                                    <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
                                </div>
                            </div>

                        </div>

                        </form>

                        <div class="ml-4">
                            <h4>Lista de actividades</h4>
                        </div>
                        

                        <div class="card-body bg-white">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                   
                                        <th >Descripción</th>
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
                                                    <form action="{{ route('actividades.destroy', $actividade->id) }}" method="POST">
                                                       
                                                        <a class="btn btn-sm btn-success" href="{{ route('actividades.edit', $actividade->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- {!! $actividades->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>



    </section>


@endsection
