@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Dil Düzenle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form class="form-control" name="form-data" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code" value="{{ $locale->code }}">
                            <label for="floatingFirst">Dil Kodu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $locale->name }}">
                            <label for="floatingFirst">Dil Tanımı</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{ route('admin.locale.index') }}" class="btn btn-danger">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('meta')
    <title>Dil Düzenle</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.locale.update',$locale)}}';
        const backUrl = '{{route('admin.locale.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
