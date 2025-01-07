<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Beranda | JAVA COLLECTION
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <span class="simple-text font-weight-bold">
          JAVA COLLECTION
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->is('manajer/beranda') ? 'active' : '' }}">
            <a href="{{route('manager.beranda')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="{{route('manajer.gaji')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Gaji</p>
            </a>
          </li>
          <li class="{{ request()->is('karyawan') || request()->is('editkaryawan') ? 'active' : '' }}">
            <a href="{{ route('manajer.editkaryawan') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Karyawan</p>
            </a>
          </li>
        </ul>
        <div class="mt-auto p-3">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-block">
              <i class="nc-icon nc-button-power"></i> Logout
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar for mobile view -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('manajer/beranda') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('manager.beranda') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('manajer.gaji') }}">Gaji</a>
            </li>
            <li class="nav-item {{ request()->is('karyawan') || request()->is('editkaryawan') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('manajer.editkaryawan') }}">Karyawan</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="content">
        <div class="mb-4">
          <small class="text-muted d-block">Beranda</small>
          <h5 class="font-weight-bold">Selamat datang!</h5>
        </div>
        @yield('content')
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      // Initializing the hamburger menu and other JS logic if necessary
    });
  </script>
</body>

</html>
