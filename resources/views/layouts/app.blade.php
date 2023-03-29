<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- JAVASCRIPT CDN BOOTSTRAP --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- cdn font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        .body {
            padding: 6px;
            border-bottom: 1px solid royalblue;
        }

        sup {
            color:rgb(67, 145, 9);
        }

    </style>

</head>

<body>

    @include('layouts.app.header')


<div class="container mt-5">

    @yield('content')


    @include('layouts.app.footer')

    {{-- alert js --}}
        <script>
  if (document.querySelector('.js-alert')) {
    document.querySelectorAll('.js-alert').forEach(function($el) {
      setTimeout(() => {
        $el.classList.remove('show');
      }, 2000);
    });
  }
    </script>

</body>
</html>
