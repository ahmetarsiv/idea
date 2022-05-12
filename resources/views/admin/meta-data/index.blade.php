@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Meta Bilgisi</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form name="form-data">
                        @csrf @method('PUT')
                        <input type="hidden" name="ck_editor" value="1">

                        <span>Slider Etkinleştir</span>
                        <div class="form-check form-switch fs-3 mb-5">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0"
                                   name="slider_allow" {{$meta_datum->slider_allow == 1 ? 'checked' : null}}>
                        </div>

                        <div class="mb-3">
                            <span>Ana Sayfa İçeriği</span>
                            <textarea id="ckeditor1" class="ckeditor"
                                      name="html_content">{!! $meta_datum->html_content !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <span>Ürün Servisler</span>
                            <textarea id="ckeditor2" class="ckeditor"
                                      name="product_service">{!! $meta_datum->product_service !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <span>Alt Sol İçeriği</span>
                            <textarea id="ckeditor3" class="ckeditor"
                                      name="footer_left">{!! $meta_datum->footer_left !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <span>Alt Orta İçeriği</span>
                            <textarea id="ckeditor4" class="ckeditor"
                                      name="footer_center">{!! $meta_datum->footer_center !!}</textarea>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_title"
                                   value="{{ $meta_datum->meta_title }}">
                            <label for="floatingFirst">Meta Başlık</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_keywords"
                                   value="{{ $meta_datum->meta_keywords }}">
                            <label for="floatingFirst">Meta Anahtar Kelimeler</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_description"
                                   value="{{ $meta_datum->meta_description }}">
                            <label for="floatingFirst">Meta Açıklama</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateCkButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{ route('admin.meta-data.edit') }}" class="btn btn-danger">İptal</a>
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
    <title>Meta Bilgisi</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.meta-data.update')}}';
        const backUrl = '{{route('admin.meta-data.edit')}}';
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('ckeditor4');
    </script>
    @include('admin.layouts.extension.script')
@endsection
