<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') - МИА Новости @show</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/heroes.css') }}" rel="stylesheet">
  </head>
  <body>

<x-header></x-header>

<main>

  <div class="container col-xxl-8 px-4 py-5">
    @yield('content')
  </div>

</main>

<x-footer></x-footer>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  </body>
</html>