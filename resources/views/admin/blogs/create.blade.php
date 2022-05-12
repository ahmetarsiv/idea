@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Blog Ekle</h2>
                </blockquote>
            </figure>
            <form name="form-data" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name">
                            <label for="floatingFirst">Blog Başlığı</label>
                        </div>
                        <textarea class="form-control" name="short_description" placeholder="Kısa Açıklama"
                                  id="floatingTextarea2" style="height: 100px"></textarea>
                        <div class="mb-3">
                            <label class="mb-2"></label>
                            <textarea id="ckeditor" name="description"></textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="default_category"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="author"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Yazar</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" multiple name="locale" style="height: 100px">
                                @foreach($locales as $locale)
                                    <option value="{{$locale->code}}">{{$locale->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="published_at"
                                   placeholder="Yayınlama Tarihi">
                            <label for="floatingFirst">Yayınlama Tarihi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tags">
                            <label for="floatingFirst">Etiketler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_title">
                            <label for="floatingFirst">Meta Başlık</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="slug">
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
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0"
                                   name="status" checked>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-danger">İptal</a>
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
    <title>Blog Ekle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.blog.store')}}';
        const backUrl = '{{route('admin.blog.index')}}';
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    @include('admin.layouts.extension.script')
@endsection
