{{-- @extends('layouts.app') --}}
@extends('layouts.loginregister')

@section('content')
  <div class="left-side-register py-5 d-flex align-items-center justify-content-center">
    <div class="width-container">
      <div class="">
        <div class="card cardregister">
          <div class="d-flex justify-content-center">
            <a href="/" class="w-50 d-flex justify-content-center">
              <img class="w-50 mt-3" src="{{ asset('assets/Logo.svg') }}" href="/">
            </a>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group d-flex flex-column align-items-center">
                <label for="email"
                  class="col-md-3 pink-color2 col-form-label text-center">{{ __('E-Mail Address') }}</label>

                <div class="col-md-8">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center">
                <label for="password" class="col-md-3 pink-color2 col-form-label text-center">{{ __('Password') }}</label>

                <div class="col-md-8">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around">
                <button type="submit" class="btn rounded-5 mb-4 btn-login-register">
                  {{ __('Login') }}
                </button>
                <div class="col-md-8 p-0">
                  <div class="form-check text-center">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label pink-color2 text-center" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class=" m-0 d-flex justify-content-center">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link pink-color2" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around mb-0">
                <p><a class="pink-color2" href="/register">First time here? Register!</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
