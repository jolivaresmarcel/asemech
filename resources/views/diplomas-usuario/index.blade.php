@extends('layouts.app')

@section('template_title')
    Diplomas Usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Diplomas Usuarios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('diplomas-usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Evento Id</th>
									<th >User Id</th>
									<th >Diploma Id</th>
									<th >Nota</th>
									<th >Asistencia</th>
									<th >Publicado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diplomasUsuarios as $diplomasUsuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $diplomasUsuario->evento_id }}</td>
										<td >{{ $diplomasUsuario->user_id }}</td>
										<td >{{ $diplomasUsuario->diploma_id }}</td>
										<td >{{ $diplomasUsuario->nota }}</td>
										<td >{{ $diplomasUsuario->asistencia }}</td>
										<td >{{ $diplomasUsuario->publicado }}</td>

                                            <td>
                                                <form action="{{ route('diplomas-usuarios.destroy', $diplomasUsuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('diplomas-usuarios.show', $diplomasUsuario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('diplomas-usuarios.edit', $diplomasUsuario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $diplomasUsuarios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
