@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Ürün Düzenle</h2>
                </blockquote>
            </figure>
            <form name="form-data" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sku" maxlength="13" value="{{ $product->sku }}">
                            <label for="floatingFirst">Barkod</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            <label for="floatingFirst">Fiyat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="tax" value="{{ $product->tax }}">
                            <label for="floatingFirst">Vergi Oranı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            <label for="floatingFirst">Ürün Adı</label>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2"></label>
                            <textarea id="ckeditor" name="description">{!! $product->description !!}</textarea>
                            <input type="hidden" name="ck_editor" value="1">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" multiple name="locale" style="height: 100px">
                                @foreach($locales as $locale)
                                    <option value="{{$locale->code}}" {{$locale->code == $product->locale ? 'selected' : null}}>{{$locale->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="default_category"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->default_category ? 'selected' : null}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                            <label for="floatingFirst">Meta Başlık</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                            <label for="floatingFirst">URL Anahtarı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_keywords" value="{{ $product->meta_keywords }}">
                            <label for="floatingFirst">Meta Anahtar Kelimeler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_description" value="{{ $product->meta_description }}">
                            <label for="floatingFirst">Meta Açıklama</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                            <label class="input-group-text" for="inputGroupFile02">Görüntü</label>
                        </div>
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0"
                                   name="status" {{$product->status == 1 ? 'checked' : null}}>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">İptal</a>
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
    <title>Ürün Düzenle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.product.update',$product)}}';
        const backUrl = '{{route('admin.product.index')}}';
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    @include('admin.layouts.extension.script')
@endsection
