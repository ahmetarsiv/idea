@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Slider Ekle</h2>
                </blockquote>
            </figure>
            <form class="form-control" name="form-data" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title">
                            <label for="floatingFirst">Başlık</label>
                        </div>
                        <div class="mb-3">
                            <textarea id="ckeditor" name="description"></textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="locale"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($locales as $locale)
                                    <option value="{{$locale->id}}">{{$locale->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Varsayılan Dil</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="path">
                            <label for="floatingFirst">Yol</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="status" checked>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                        <a href="{{ route('admin.slider.index') }}" class="btn btn-danger">İptal</a>
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
    <title>Slider Ekle</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('admin.slider.store')}}';
        const backUrl = '{{route('admin.slider.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
