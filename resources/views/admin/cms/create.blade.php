@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sayfa Ekle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <form name="form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="page_title">
                            <label for="floatingFirst">Sayfa Başlığı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" multiple name="locale" style="height: 150px">
                                @foreach($locales as $locale)
                                    <option value="{{$locale->id}}">{{$locale->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">İçerik</label>
                            <textarea id="ckeditor" name="html_content"></textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_title">
                            <label for="floatingFirst">Meta Başlık</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="url_key">
                            <label for="floatingFirst">URL Anahtarı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_keywords">
                            <label for="floatingFirst">Meta Anahtar Kelimeler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_description">
                            <label for="floatingFirst">Meta Açıklama</label>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                            <a href="{{ route('admin.cms.index') }}" class="btn btn-danger">İptal</a>
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
    <title>Sayfa Ekle</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.cms.store')}}';
        const backUrl = '{{route('admin.cms.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
