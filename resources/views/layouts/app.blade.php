<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FontAwesome css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap css -->
    <link href="{{ asset('css/bootstrap-4.6.0.min.css') }}" rel="stylesheet">
    <!-- Custom Styles -->

     @stack('styles')

    <title>{{ config('app.name', 'Sq1-Practice') }}</title>
</head>
<body>
      @auth
        <header class="sticky-top">
          @include('shared.navbar')
        </header>
      @endauth

      <main class="pt-3">
        @yield('content')
      </main>

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap-4.6.0.bundle.min.js') }}"></script>
      <!-- custom JS -->

      @stack('scripts')
</body>
</html>
