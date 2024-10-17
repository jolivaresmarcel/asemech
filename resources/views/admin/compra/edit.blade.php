@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Compra
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <span class="card-title">{{ __('Update') }} Compra</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('compras.update', $compra->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('compra.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
