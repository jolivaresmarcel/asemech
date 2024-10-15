@extends('layouts.app')

@section('template_title')
    Certificados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Certificados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('certificados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Usuario</th>
									<th >Estado</th>
									<th >Fecha Caducidad</th>
									<th >Archivo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $certificado->user->name }}</td>
										<td >
                                            @if($certificado->es_valido == 1)
                                            @if($certificado->fecha_caducidad>=now())
                                                Valido  
                                            @else
                                                Cadudado
                                            @endif    
                                        @else
                                            @if($certificado->es_valido == -1)
                                                Por validar    
                                            @else
                                                Invalido
                                            @endif    
                                        @endif
                                        </td>
										<td >{{ $certificado->fecha_caducidad }}</td>
										<td ><a href="/{{ $certificado->archivo }}">Descarga</a></td>

                                            <td>
                                                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('certificados.show', $certificado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('certificados.edit', $certificado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $certificados->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
