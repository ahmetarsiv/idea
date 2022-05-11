@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="signin" [hidden]="login">
            <h1 class="topline">Giriş Yap</h1>
            <br />
            <div class="input-field">
                <input id="email" type="text" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="input-field">
                <input id="password" type="password" placeholder="Şifre" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="action">
                <a class="forgot" href="{{ route('password.request') }}">Parolanızı mı unuttunuz?</a>
            </div>

            <div class="login-box-button">
                <button type="submit">
                    Giriş yap
                </button>
            </div>

            <footer>
                <p class="text-center mt-5">
                    <a href="#" class="text-decoration-none" style="color: #909090" target="_blank">Gizlilik Politikası - KVKK</a>
                </p>
            </footer>
        </div>
    </form>
@endsection
