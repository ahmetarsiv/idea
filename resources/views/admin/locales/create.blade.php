@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Dil Ekle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form name="form-data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="code">
                            <label for="floatingFirst">Dil Kodu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name">
                            <label for="floatingFirst">Dil Tanımı</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
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
    <title>Dil Ekle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.locale.store')}}';
        const backUrl = '{{route('admin.locale.index')}}';
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    @include('admin.layouts.extension.script')
@endsection
