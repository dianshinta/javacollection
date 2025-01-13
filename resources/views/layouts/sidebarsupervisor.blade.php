<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ $title }} | JAVA COLLECTION
  </title>
  
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

  <style>
    .top-right-logout {
      position: absolute;
      top: 8px;
      right: 15px;
      z-index: 999;
    }

    .navbar {
      background-color: #fff2f2 !important;
      margin-bottom: 0;
      /* Pink color */
    }
  
    .navbar-toggler-icon {
      background-color: transparent !important;
      /* Warna icon hamburger */
    }
  
    .navbar-nav .nav-item.active .nav-link {
      color: #500606 !important;
      /* Warna teks menu yang aktif */
    }
  
    .navbar-nav .nav-item .nav-link:hover {
      color: lightgray !important;
      /* Warna teks menu saat hover */
    }
  
    /* Navbar text color */
    .navbar-nav .nav-item .nav-link {
      color: grey !important;
      /* Set text color to  */
    }
  
    /* Change hamburger icon color when it’s clicked (active state) */
    .navbar-toggler.collapsed .navbar-toggler-icon {
      background-color: transparent !important;
      /* Change color to maroon when collapsed */
    }
  
    /* .navbar-collapse {
        display: none !important;
      }
  
      .navbar-collapse.show {
        display: block !important;
      } */
  
    .dropdown-menu {
      display: none;
      /* Hide dropdown by default */
    }
  
    .dropdown-menu.show {
      display: block;
      /* Show dropdown when active */
    }

    .dropdown-item {
        background-color: #fff2f2; /* Ubah background */
        border-radius: 5px; /* Opsional */
        transition: color 0.3s ease; /* Durasi transisi */
    }

    .dropdown-item:hover {
      color: lightgrey;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar d-none d-lg-block" data-color="white" data-active-color="danger">
      <div class="logo">
        <span class="simple-text font-weight-bold">
          JAVA COLLECTION
        </span>
      </div>
      <!-- Menu -->
      <div class="sidebar-wrapper">
        <ul class="nav">
            <!-- Beranda -->
            <li class="{{ ($title === 'Beranda') ? 'active' : '' }}">
                <a href="{{route('supervisor.beranda')}}">
                <i class="nc-icon nc-layout-11"></i>
                <p>Beranda</p>
                </a>
            </li>
            <!-- Karyawan -->
            <li class="dropdown {{($title === 'Perizinan' || $title === "Informasi") ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#karyawanDropdown">
                    <i class="nc-icon nc-single-02"></i>
                <p class="d-inline-block mr-5">Karyawan</p>
                </a>
                <div class="collapse" id="karyawanDropdown">
                    <ul class="nav" style="margin-left: 62px;">
                        <!-- Sub menu perizinan -->
                        <li class="{{($title === 'Perizinan') ? 'active' : '' }}">
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
            <li class="dropdown {{($title === 'Pengajuan' || $title === "Pembayaran") ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#kasbonDropdown">
                <i class="nc-icon nc-money-coins"></i>
                <p class="d-inline-block mr-5">Kasbon</p>
                </a>
                <div class="collapse" id="kasbonDropdown">
                    <ul class="nav" style="margin-left: 62px;">
                        <!-- Sub menu pengajuan -->
                        <li class="{{($title === 'Pengajuan') ? 'active' : '' }}">
                            <a href="{{route('supervisor.pengajuan')}}">
                                <p>Pengajuan</p>
                            </a>
                        </li>
                        <!-- Sub menu pembayaran -->
                        <li>
                            <li class="{{($title === 'Pembayaran') ? 'active' : '' }}">
                                <a href="{{route('supervisor.pembayaran')}}">
                                    <p>Pembayaran</p>
                                </a>
                            </li>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- Logout -->
        <div class="mt-auto p-3">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger btn-block">
                <i class="nc-icon nc-button-power"></i> Logout
              </button>
            </form>
        </div>
    </div>
    
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

    <!-- Navbar for mobile -->
    <div class="top-right-logout d-block d-lg-none">
      <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">
              <i class="nc-icon nc-button-power"></i> Logout
          </button>
      </form>
  </div>
  <!-- Tombol Hamburger -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Collapse -->
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <!-- Beranda -->
          <li class="nav-item {{ request()->is('supervisor/beranda') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('supervisor.beranda') }}">
                  <i class="nc-icon nc-layout-11"></i> Beranda
              </a>
          </li>

          <!-- Karyawan -->
          <li class="nav-item dropdown {{ ($title === 'Perizinan' || $title === 'Informasi') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#" id="karyawanDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i> Karyawan
              </a>
              <div class="dropdown-menu" aria-labelledby="karyawanDropdown">
                  <a style="background-color: #fff2f2" class="dropdown-item {{ $title === 'Perizinan' ? 'active' : '' }}" href="{{ route('supervisor.perizinan') }}">
                      Perizinan
                  </a>
                  <a style="background-color: #fff2f2" class="dropdown-item {{ request()->is('supervisor/infokaryawan') ? 'active' : '' }}" href="{{ route('supervisor.infokaryawan') }}">
                      Informasi Karyawan
                  </a>
              </div>
          </li>

          <!-- Kasbon -->
          <li class="nav-item dropdown {{ ($title === 'Pengajuan' || $title === 'Pembayaran') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#" id="kasbonDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-money-coins"></i> Kasbon
              </a>
              <div class="dropdown-menu" aria-labelledby="kasbonDropdown">
                  <a style="background-color: #fff2f2"  class="dropdown-item {{ $title === 'Pengajuan' ? 'active' : '' }}" href="{{ route('supervisor.pengajuan') }}">
                      Pengajuan
                  </a>
                  <a style="background-color: #fff2f2" class="dropdown-item {{ $title === 'Pembayaran' ? 'active' : '' }}" href="{{ route('supervisor.pembayaran') }}">
                      Pembayaran
                  </a>
              </div>
          </li>
      </ul>
    </div>
</nav>
    <!-- Main Panel Content -->
    <div class="main-panel">
    

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
