@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Yapılandırma</h2>
                </blockquote>
            </figure>
            <form name="form-data" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="" checked>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('meta')
    <title>Yapılandırma</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.configuration.store')}}';
        const backUrl = '{{route('admin.configuration.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection
