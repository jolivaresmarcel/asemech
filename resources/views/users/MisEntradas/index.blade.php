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
                                {{ __('Mis entradas') }}
                            </span>

                            
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
									<th >Usuario</th>
								

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entradasEventos as $entradasEvento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										
										<td >{{ $entradasEvento->evento->titulo }}</td>
										<td >{{ $entradasEvento->user->name }}</td>
							

                                            <td>
                                                   <a class="btn btn-sm btn-secondary " href="{{'download/'.$entradasEvento->id}}">Descargar Entrada</a>


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
