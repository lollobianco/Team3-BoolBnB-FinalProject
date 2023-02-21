@extends('layouts.loginregister')

@section('content')
  <div class="left-side-register py-5 d-flex align-items-center justify-content-center position-relative">
    <div class="width-container">
      <div class="">
        <div class="card cardregister">
          <div class="d-flex justify-content-center">
            <a href="/" class="w-50 d-flex justify-content-center">
              <img class="w-50 mt-3" src="{{ asset('assets/Logo.svg') }}" href="/">
            </a>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group d-flex flex-column align-items-center">
                <label for="name" class="col-md-3 pink-color2 col-form-label text-center">{{ __('Name') }}</label>

                <div class="col-md-8">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- SURNAME --}}
              <div class="form-group d-flex flex-column align-items-center">
                <label for="surname" class="col-md-3 pink-color2 col-form-label text-center">{{ __('Surname') }}</label>

                <div class="col-md-8">
                  <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                    name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                  @error('surname')
                    <span class="invalid-feedback" role="alert">
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    </span>
                  @enderror
                </div>
              </div>

              {{-- Date Of Birth --}}
              <div class="form-group d-flex flex-column align-items-center justify-content-around">
                <label for="date_of_birth"
                  class="col-md-3 pink-color2 col-form-label text-center">{{ __('Date Of Birth') }}</label>

                <div class="col-md-8">
                  <input id="date_of_birth" type="date"
                    class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                    value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                  @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around">
                <label for="email"
                  class="col-md-3 pink-color2 col-form-label text-center">{{ __('E-Mail Address') }}</label>

                <div class="col-md-8">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around">
                <label for="password"
                  class="col-md-3 pink-color2 col-form-label text-center">{{ __('Password') }}</label>

                <div class="col-md-8">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around">
                <label for="password-confirm"
                  class="col-md-3 col-form-label pink-color2 col-form-label text-center">{{ __('Confirm Password') }}</label>

                <div class="col-md-8">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around mb-0">
                <div class="">
                  <button type="submit" class="btn rounded-5 btn-login-register">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>

              <div class="form-group d-flex flex-column align-items-center justify-content-around mb-0">
                <p><a class="pink-color2" href="/login">If you are already registered log-in</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
