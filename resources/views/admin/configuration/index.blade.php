@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Yapılandırma</h2>
                </blockquote>
            </figure>
            <form name="form-data" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="copyright" value="{{ $configuration->copyright }}">
                            <label for="floatingFirst">Copyright İçerik Metni</label>
                        </div>

                        <div class="form-floating mb-3">
                            <span>Copyright Açılır/Kapanır</span>
                            <div class="form-check form-switch fs-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="copyright_allow"
                                    {{$configuration->copyright_allow == 1 ? 'checked' : null}}>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <span>Bloglara İzin Ver</span>
                            <div class="form-check form-switch fs-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="blog_allow"
                                    {{$configuration->blog_allow == 1 ? 'checked' : null}}>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <span>Ürünlere İzin Ver</span>
                            <div class="form-check form-switch fs-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="product_allow"
                                    {{$configuration->product_allow == 1 ? 'checked' : null}}>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <span>Kategorilere İzin Ver</span>
                            <div class="form-check form-switch fs-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="category_allow"
                                    {{$configuration->category_allow == 1 ? 'checked' : null}}>
                            </div>
                        </div>

                        <div class="form-floating mb-5">
                            <span>CMS İzin Ver</span>
                            <div class="form-check form-switch fs-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="0" name="cms_allow"
                                    {{$configuration->cms_allow == 1 ? 'checked' : null}}>
                            </div>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" name="custom_css" placeholder="Özel Css"
                                      id="floatingTextarea2" style="height: 100px;">{!! $configuration->custom_css !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" name="custom_js" placeholder="Özel JavaScript"
                                      id="floatingTextarea2" style="height: 100px;">{!! $configuration->custom_js !!}</textarea>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet</button>
                        <a href="{{ route('admin.configuration.edit') }}" class="btn btn-danger">İptal</a>
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
    <title>Yapılandırma</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.configuration.update')}}';
        const backUrl = '{{route('admin.configuration.edit')}}';
    </script>
    @include('admin.layouts.extension.script')
@endsection
