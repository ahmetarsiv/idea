@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>İçerik Ekle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form name="form-data" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title">
                            <label for="floatingFirst">Başlık</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="slug">
                            <label for="floatingFirst">Bağlantı Yolu</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="target">
                                <option disabled selected>Seçiniz</option>
                                <option value="_self">Aynı</option>
                                <option value="_blank">Yeni Sekme</option>
                            </select>
                            <label for="floatingSelect">Sayfa Link Hedefi</label>
                        </div>

                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0"
                                   name="status" checked>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{ route('admin.meta-content.index') }}" class="btn btn-danger">İptal</a>
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
    <title>İçerik Ekle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.meta-content.store')}}';
        const backUrl = '{{route('admin.meta-content.index')}}';
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    @include('admin.layouts.extension.script')
@endsection
