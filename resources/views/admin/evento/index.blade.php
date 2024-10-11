@extends('layouts.app')

@section('template_title')
    Eventos
@endsection

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Eventos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('eventos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Titulo</th>
									<th >Descripcion</th>
									<th >Terminos</th>
									<th >Foto</th>
									<th >Inicio</th>
									<th >Termino</th>
									<th >Cupos</th>
									<th >Pucbicar</th>
									<th >Lugar</th>
									<th >Valor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $evento->titulo }}</td>
										<td >{{ $evento->descripcion }}</td>
										<td >{{ $evento->terminos }}</td>
										<td >{{ $evento->foto }}</td>
										<td >{{ $evento->inicio }}</td>
										<td >{{ $evento->termino }}</td>
										<td >{{ $evento->cupos }}</td>
										<td >{{ $evento->pucbicar }}</td>
										<td >{{ $evento->lugar }}</td>
										<td >{{ $evento->valor }}</td>

                                            <td>
                                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('eventos.show', $evento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('eventos.edit', $evento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $eventos->withQueryString()->links() !!}
            </div>
        </div>
    </div> --}}

    <br>


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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Eventos') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('eventos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Nuevo') }}
                            </a>
                         
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="container-fluid">



    <div class="row">
    @foreach ($eventos as $eventos)
    <div class="m-1">
    <div class="card" style="width: 18rem;">
    <img src="/{{ $eventos->foto }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $eventos->titulo }}</h5>
      <p class="card-text">{{ $eventos->descripcion }}</p>
      <form action="{{ route('eventos.destroy', $eventos->id) }}" method="POST">
        <a class="btn btn-sm btn-primary " href="{{ route('eventos.show', $eventos->id) }}"><i class="fa fa-fw fa-eye"></i></a>
        <a class="btn btn-sm btn-success" href="{{ route('eventos.edit', $eventos->id) }}"><i class="fa fa-fw fa-edit"></i></a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i></button>
    </form>
    </div>
  </div>
    </div>
  @endforeach
    </div>
</div>




@endsection
