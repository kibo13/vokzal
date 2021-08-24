<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Vokzal - @yield('title')</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('icons/logo.svg') }}" />

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body>
  <div id="app" class="wrapper">
    @include('admin.partials.sidebar')
    <main class="main">
      <div id="content" class="content">
        <!-- navbar -->
        @include('admin.partials.navbar')
        <!-- content -->
        @yield('content')
      </div>
    </main>
  </div>

  @include('admin.components.modals.destroy')


  <script
    src="https://cdn.tiny.cloud/1/ar4bmcaywhn7gt2eek2wtrtrlattnhzqpbeda16dqfp03avf/tinymce/5/tinymce.min.js" referrerpolicy="origin">
  </script>

  <script>
    tinymce.init({
      selector: '.tiny-mce',
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | ' +
      'bold italic backcolor | link code',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  </script>
</body>

</html>
