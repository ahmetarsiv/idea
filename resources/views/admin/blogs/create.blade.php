@extends('admin.layouts.app')

@section('content')

    <form name="form-data" enctype="multipart/form-data">

        <div class="page-header">
            <div class="page-title">
                <h1>
                    Blog Ekle
                </h1>
            </div>

            <div class="page-action">
                <button type="button" onclick="createAndUpdateButton()" class="btn btn-lg btn-success">
                    Kaydet
                </button>
            </div>
        </div>

        <div class="page-content">
            <div class="form-container">
                <div slot="body">

                    @csrf()

                    <div class="control-group multi-select">
                        <label for="locale">Locale</label>
                        <select class="control" id="locale" name="locale" multiple>
                            @foreach ($locales as $locale)
                                <option value="{{ $locale->id }}">
                                    {{ $locale->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <label for="name" class="required">Blog adı</label>
                        <input type="text" class="control" name="name">
                    </div>

                    <div class="control-group">
                        <label for="slug" class="required">Slug</label>
                        <input type="text" class="control" name="slug">
                    </div>

                    <div class="control-group date">
                        <label for="published_at">Published At</label>
                        <input type="date" name="published_at" class="control" />
                    </div>

                    <div class="control-group">
                        <label for="status">Durum</label>
                        <select class="control" id="status" name="status">
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                </div>

                <div slot="body">
                    <div class="control-group">
                        <label for="default_category" class="required">Yazar</label>
                        <select class="control" id="author" name="author">
                            <option value>Select an author</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <label for="default_category" class="required">Kategori</label>
                        <select class="control" id="default_category" name="default_category">
                            <option value>Select an category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <label for="tags" class="required">Tags</label>
                        <input type="text" class="control" name="tags">
                    </div>
                </div>

                <div slot="body">
                    <div class="control-group">
                        <label for="short_description" class="required">Short Description</label>
                        <input type="text" class="control" name="short_description">
                    </div>

                    <div class="control-group">
                        <label for="description" class="required">Description</label>
                        <input type="text" class="control" id="ckeditor" name="description">
                    </div>
                </div>

                <div slot="body">
                    <div class="control-group">
                        <label class="required">Image</label>
                        <input type="file" name="image" class="control"/>
                    </div>
                </div>

                <div slot="body">
                    <div class="control-group">
                        <label for="meta_title" class="required">Meta Title</label>
                        <input type="text" class="control" name="meta_title">
                    </div>

                    <div class="control-group">
                        <label for="meta_keywords" class="required">Meta Keywords</label>
                        <textarea class="control" name="meta_keywords"></textarea>
                    </div>

                    <div class="control-group">
                        <label for="meta_description" class="required">Meta Description</label>
                        <textarea class="control" name="meta_description"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('meta')
    <title>Blog Ekle</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.blog.store')}}';
        const backUrl = '{{route('admin.blog.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
