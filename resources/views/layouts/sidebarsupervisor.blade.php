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
  <style>
    .top-right-logout {
      position: absolute;
      top: 8px;
      right: 15px;
      z-index: 999;
    }
  </style>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
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
      <!-- Menu -->
        @include('supervisor.menu')
      <!-- END MENU -->
      {{-- <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- Beranda -->
          <li class="{{ request()->is('supervisor/beranda') ? 'active' : '' }}">
            <a href="{{route('supervisor.beranda')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Beranda</p>
            </a>
          </li>
          <!-- Karyawan -->
          <li class="dropdown {{ request()->is('supervisor/*') && !request()->is('supervisor/berandasup') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#karyawanDropdown">
              <i class="nc-icon nc-single-copy-04"></i>
              <p class="d-inline-block mr-5">Karyawan</p>
            </a>
            <div class="collapse {{ request()->is('supervisor/*') && !request()->is('supervisor/berandasup') ? 'show' : '' }}" id="karyawanDropdown">
              <ul class="nav" style="margin-left: 62px;">
                <!-- Sub menu perizinan -->
                <li class="{{ request()->is('supervisor/perizinan') ? 'active' : '' }}">
                  <a href="{{route('supervisor.perizinan')}}">
                    <p>Perizinan</p>
                  </a>
                </li>
                <!-- Sub menu informasi -->
                <li class="{{ request()->is('supervisor/infokaryawan') ? 'active' : '' }}">
                  <a href="{{ route('supervisor.infokaryawan') }}">
                    <p>Informasi Karyawan</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Kasbon -->
          <li class="dropdown {{ request()->is('pengajuan', 'pembayarankasbon') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="{{ request()->is('pengajuan', 'pembayarankasbon') ? 'true' : 'false' }}" data-target="#kasbonDropdown">
              <i class="nc-icon nc-single-copy-04"></i>
              <p class="d-inline-block mr-5">Kasbon</p>
            </a>
            <div class="collapse {{ request()->is('pengajuan', 'pembayarankasbon') ? 'show' : '' }}" id="kasbonDropdown">
              <ul class="nav" style="margin-left: 62px;">
                <!-- Sub menu pengajuan -->
                <li class="{{ request()->is('pengajuan') ? 'active' : '' }}">
                  <a href="{{route('supervisor.pengajuan')}}">
                    <p>Pengajuan</p>
                  </a>
                </li>
                <!-- Sub menu pembayaran -->
                <li class="{{ request()->is('pembayarankasbon') ? 'active' : '' }}">
                  <a href="{{route('supervisor.pembayaran')}}">
                    <p>Pembayaran</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
        <!-- Logout -->
        <div class="top-right-logout d-block">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="nc-icon nc-button-power"></i> Logout
        </button>
    </form>
</div>
        <script>
    function clearSession(event) {
        // Konfirmasi logout (opsional)
        const confirmLogout = confirm("Apakah Anda yakin ingin logout?");
        if (!confirmLogout) {
            event.preventDefault();
            return;
        }
        
        // Hapus data di localStorage atau sessionStorage (jika digunakan di client-side)
        sessionStorage.clear();
        localStorage.removeItem('user_data'); // Contoh jika ada data user
    }
</script>
      </div> --}}
    </div>

    <!-- Main Panel Content -->
    <div class="main-panel">
      <div class="navbar navbar-expand-lg navbar-light bg-light d-block d-md-none">
        <!-- Hamburger Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle sidebar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="content">
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
      // Additional JS for Hamburger Toggle
      $('.navbar-toggler').click(function() {
        $('.sidebar').toggleClass('active');
      });
    });
  </script>
</body>
</html>
