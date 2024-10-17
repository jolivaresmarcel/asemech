@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Diploma
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header" style="background-color: #001a3b; color:rgb(255, 255, 255);">
                        <span class="card-title">{{ __('Update') }} Diploma</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('diplomas.update', $diploma->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.diploma.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection