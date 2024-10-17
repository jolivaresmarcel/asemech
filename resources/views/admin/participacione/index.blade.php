@extends('layouts.app')

@section('template_title')
    Participaciones
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                   <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Participaciones') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('participaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
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
									<th >Actividad</th>
									<th >Usuario</th>
									<th >Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participaciones as $participacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $participacione->evento->titulo }}</td>
										<td >{{ $participacione->actividade->descripcion }}</td>
										<td >{{ $participacione->user->name }}</td>
										<td >{{ $participacione->fecha }}</td>

                                            <td>
                                                {{-- <form action="{{ route('participaciones.destroy', $participacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('participaciones.show', $participacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('participaciones.edit', $participacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $participaciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
