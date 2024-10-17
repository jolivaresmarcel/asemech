@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Diplomas Usuario
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                   <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <span class="card-title">{{ __('Update') }} Diplomas Usuario</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('diplomas-usuarios.update', $diplomasUsuario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.diplomas-usuario.formEdit')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
