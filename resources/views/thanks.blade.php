<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vokzal</title>
  <link rel="shortcut icon" href="{{ asset('icons/logo.svg') }}" />
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>

<body>
  <div class="gv-wrapper">
    <div class="gv-modal">
        <div class="gv-modal__image">
            <svg viewBox="0 0 32 32" style="fill:#48DB71"><path d="M1 14 L5 10 L13 18 L27 4 L31 8 L13 26 z"></path></svg>
        </div>
        <h2>{{ __('main.thx') }}</h2>
        <p class="gv-modal__desc">
          @if(getCurrentLang() === 'ru')
          {{ $message->desc_ru }}
          @elseif(getCurrentLang() === 'en')
          {{ $message->desc_en }}
          @else
          {{ $message->desc_kk }}
          @endif
        </p>
        <a class="gv-link" href="{{ route('home') }}">{{ __('main.ready') }}</a>
    </div>
  </div>
</body>

</html>
