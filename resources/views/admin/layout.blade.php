<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>

</head>
<body>

@php
$route = request()->route()->getName();
@endphp

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">TpAgence</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="nav-item"><a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Home</a></li>
      <li class="nav-item"><a href="{{ route('admin.option.index') }}" @class(['nav-link', 'active' => str_contains($route, 'option.')])>Options</a></li>
      @auth
        <li class="nav-item">
          <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-primary">Logout</button>
          </form>
        </li>
      @endauth
    </ul>
  </div>
</nav>




<div class="container mt-5">


    @include('shared.flash')

    @yield('content')


</div>

    

<script>
  new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'supprimer'}}});
</script>


</body>
</html>