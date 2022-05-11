@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Blog Düzenle</h2>
                </blockquote>
            </figure>
            <form name="form-data" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $blog->name }}">
                            <label for="floatingFirst">Blog Başlığı</label>
                        </div>
                        <textarea class="form-control" name="short_description" placeholder="Kısa Açıklama"
                                  id="floatingTextarea2" style="height: 100px">{{ $blog->short_description }}</textarea>
                        <div class="mb-3">
                            <label class="mb-2"></label>
                            <textarea id="ckeditor" name="description">{{ $blog->description }}</textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="default_category"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $blog->default_category ? 'selected' : null}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="author"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{$user->id == $blog->author ? 'selected' : null}}>{{$user->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Yazar</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" multiple name="locale" style="height: 100px">
                                @foreach($locales as $locale)
                                    <option value="{{$locale->id}}" {{$locale->id == $blog->locale ? 'selected' : null}}>{{$locale->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="published_at"
                                   placeholder="Yayınlama Tarihi">
                            <label for="floatingFirst">Yayınlama Tarihi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tags" value="{{ $blog->tags }}">
                            <label for="floatingFirst">Etiketler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_title" value="{{ $blog->meta_title }}">
                            <label for="floatingFirst">Meta Başlık</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="slug" value="{{ $blog->slug }}">
                            <label for="floatingFirst">URL Anahtarı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_keywords" value="{{ $blog->meta_keywords }}">
                            <label for="floatingFirst">Meta Anahtar Kelimeler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_description" value="{{ $blog->meta_description }}">
                            <label for="floatingFirst">Meta Açıklama</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="status" {{$blog->status == 1 ? 'checked' : null}}>
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
    <title>Blog Düzenle</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.blog.update',$blog)}}';
        const backUrl = '{{route('admin.blog.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
