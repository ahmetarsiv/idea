@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Kullanıcı Ekle</h2>
                </blockquote>
            </figure>
            <form name="form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Adı">
                            <label for="floatingFirst">Adı</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Yeni Parola">
                            <label for="floatingLast">Yeni Parola</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                   id="password-confirm" placeholder="Parola Doğrula">
                            <label for="floatingLast">Parola Doğrula</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <label for="floatingMail">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="role_id">
                                <option disabled selected>Seçiniz</option>
                                <option value="1">Administrator</option>
                                <option value="2">Guest</option>
                            </select>
                            <label for="floatingSelect">Rol</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-danger">İptal</a>
                        </div>

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
    <title>Kullanıcı Ekle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.user.store')}}';
        const backUrl = '{{route('admin.user.index')}}';
    </script>
    @include('admin.layouts.extension.script')
@endsection
