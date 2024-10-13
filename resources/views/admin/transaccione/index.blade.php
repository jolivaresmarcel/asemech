@extends('layouts.app')

@section('template_title')
    Transacciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Transacciones') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('transacciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Transacción ID</th>
									<th >Evento</th>
									<th >Usuario</th>
                                    <th >Rur</th>
									<th >Estado</th>
									<th >Detalle Estado</th>
									{{-- <th >Create Payment</th>
									<th >Get Payment</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transacciones as $transaccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $transaccione->payment_id }}</td>
                                        <td >{{ $transaccione->evento->titulo }}</td>
										<td >{{ $transaccione->user->name }}</td>
                                        <td >{{ $transaccione->user->rut }}</td>
										<td >{{ $transaccione->status }}</td>
										<td >{{ $transaccione->status_detail }}</td>
										{{-- <td >{{ $transaccione->create_payment }}</td>
										<td >{{ $transaccione->get_payment }}</td> --}}

                                            <td>
                                                <a class="btn btn-sm btn-danger " href="{{ route('transacciones.show', $transaccione->id) }}">{{ __('Validación de pago') }}</a>
                                                {{-- <form action="{{ route('transacciones.destroy', $transaccione->id) }}" method="POST">
                                                   
                                                    <a class="btn btn-sm btn-success" href="{{ route('transacciones.edit', $transaccione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $transacciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection