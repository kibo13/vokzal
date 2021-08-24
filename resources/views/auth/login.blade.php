<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Vokzal - {{ __('auth.auth') }}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('icons/logo.svg') }}" />

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body>
  <div id="app" class="auth">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="auth-logo">
          <img class="auth-logo__icon" src="{{ asset('icons/logo.svg') }}" alt="logo" />
        </div>

        <h5 class="mb-3 text-center text-uppercase">
          {{ __('auth.auth') }}
        </h5>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <input
              id="name"
              type="text"
              class="form-control @error('name') is-invalid @enderror"
              name="name"
              required
              placeholder="{{ __('auth.name') }}"
              autocomplete="off" />

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <input
              id="password"
              type="password"
              class="form-control @error('name') is-invalid @enderror"
              name="password"
              required
              placeholder="{{ __('auth.password') }}"
              autocomplete="off" />

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group mb-0 text-center">
            <button type="submit" class="btn btn-primary">
              {{ __('auth.login') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
