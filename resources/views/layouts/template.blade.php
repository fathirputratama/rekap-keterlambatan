<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rekap Keterlambatan</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        .navbar{
            box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.25);
        }
    </style>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home.page') }}">Rekam Keterlambatan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Rekam Keterlambatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          @if(Auth::check())
          @if(Auth::user()->role == "admin")
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Data Master
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('rombel.index') }}">Data Rombel</a></li>
              <li><a class="dropdown-item" href="{{ route('rayon.index') }}">Data Rayon</a></li>
              <li><a class="dropdown-item" href="{{ route('student.index') }}">Data Siswa</a></li>
              <li><a class="dropdown-item" href="{{ route('user.index') }}">Data User</a></li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('keterlambatan.index') }}">Data Keterlambatan</a>
          </li>
          @else
          <li><a class="dropdown-item" href="{{ route('student.index') }}">Data Siswa</a></li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('keterlambatan.index') }}">Data Keterlambatan</a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>


</body>
</html>