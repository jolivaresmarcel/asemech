@extends('layouts.app')

@section('template_title')
    Entradas Eventos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Entradas Eventos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('entradas-eventos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
								
									<th >Evento</th>
									<th >User</th>
									<th >Fecha Compra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradasEventos as $entradasEvento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										
										<td >{{ $entradasEvento->evento->titulo }}</td>
										<td >{{ $entradasEvento->user->name }}</td>
										<td >{{ $entradasEvento->fecha_compra }}</td>

                                            <td>
                                                <form action="{{ route('entradas-eventos.destroy', $entradasEvento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('entradas-eventos.show', $entradasEvento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entradas-eventos.edit', $entradasEvento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Seguro que desea eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    <a class="btn btn-sm btn-secondary " href="{{'download/'.$entradasEvento->id}}">Descargar Entrada</a>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entradasEventos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
