@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Profil Düzenle</h2>
                </blockquote>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form name="form-data">
                        @csrf @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Adı"
                                   value="{{$user->name}}">
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
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                   value="{{$user->email}}">
                            <label for="floatingMail">Email</label>
                        </div>

                        <div class="mt-3">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">İptal</a>
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
    <title>Profil Düzenle</title>
@endsection

@section('js')
    <script>
        const actionUrl = '{{route('admin.profile.update')}}';
        const backUrl = '{{route('admin.profile.edit')}}';
    </script>
    @include('admin.layouts.extension.script')
@endsection
