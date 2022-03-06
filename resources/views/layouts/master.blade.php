<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSRF Token -->
  <meta id="post_token" name="csrf-token" content="{{ csrf_token() }}">

  <title>Vokzal - @yield('title')</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('icons/logo.svg') }}" />

  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/fonts/font.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/hamburger.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/localization.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/loader.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/custom-select.css') }}" />
</head>

<body>
  <div id="app" class="site">

    <!-- /.header -->
    <div
      class="wrapper @yield('background-header')"
      @isset($category)
      style="background: url({{ asset('images/'. $category->image) }})"
      @endisset >

      @isset($isCart)
        @include('partials.cart-header')
      @else
        @include('partials.general-header')
      @endisset

      @yield('section-title')
    </div>

    <!-- /.content -->
    <div class="main @yield('background-content')">
      @yield('section-content')

      <div class="@yield('background-footer')">
        @isset($isGallery)
          @include('components.gallery')
        @endisset

        @isset($isPagination)
          @include('components.pagination')
        @endisset

        <!-- /.footer -->
        @include('partials.footer')
      </div>
    </div>

    <!-- /.mobile -->
    <div class="overlay hide">
      @include('partials.mobile')

      @isset($isGallery)
        @include('components.index-slider')
      @endisset

      @isset($isVip)
        @include('components.vip-slider')
      @endisset

      @isset($isBar)
        @include('components.bar-slider')
      @endisset

      @isset($isAge)
        @include('components.age-modal')
      @endisset
    </div>
  </div>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5CBZPBZ');</script>
  <!-- End Google Tag Manager -->

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CBZPBZ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Vendors -->
  <script src="https://epay.homebank.kz/payform/payment-api.js"></script>
  <script src="{{ asset('js/vendors/jquery.min.js') }}"></script>
  <script src="{{ asset('js/vendors/slick.min.js') }}"></script>
  <script src="{{ asset('js/vendors/imask.js') }}"></script>
  <script src="{{ asset('js/vendors/axios.min.js') }}"></script>

  <!-- General -->
  <script src="{{ asset('js/script.js') }}"></script>

  <!-- Custom -->
  <script src="{{ asset('js/custom/localization.js') }}"></script>
  <script src="{{ asset('js/custom/bar.js') }}"></script>
  <script src="{{ asset('js/custom/alcohol.js') }}"></script>
  <script src="{{ asset('js/custom/cart.js') }}"></script>
  <script src="{{ asset('js/custom/validation.js') }}"></script>
  <script src="{{ asset('js/custom/payment.js') }}"></script>
</body>

</html>
