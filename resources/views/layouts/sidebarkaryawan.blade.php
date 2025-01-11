<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ $title ?? 'Gaji' }} | JAVA COLLECTION
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

  <!-- dari presensi.blade.php -->
  <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- dari gaji.blade.php -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/perizinan-modal.css" rel="stylesheet" />
    <link href="../assets/css/pengajuan-modal.css" rel="stylesheet" />
    <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />

    


  <style>
    .top-right-logout {
      position: absolute;
      top: 8px;
      right: 15px;
      z-index: 999;
    }
    .navbar {
      background-color: #fff2f2 !important; /* Pink color */
    }

    .navbar-toggler-icon {
      background-color: transparent !important; /* Warna icon hamburger */
    }

    .navbar-nav .nav-item.active .nav-link {
      color: #500606 !important; /* Warna teks menu yang aktif */
    }

    .navbar-nav .nav-item .nav-link:hover {
      color: lightgray !important; /* Warna teks menu saat hover */
    }

    /* Navbar text color */
    .navbar-nav .nav-item .nav-link {
      color: grey !important; /* Set text color to  */
    }

    /* Change hamburger icon color when it’s clicked (active state) */
    .navbar-toggler.collapsed .navbar-toggler-icon {
      background-color: transparent !important; /* Change color to maroon when collapsed */
    }

    /* .navbar-collapse {
      display: none !important;
    }

    .navbar-collapse.show {
      display: block !important;
    } */

    .dropdown-menu {
      display: none; /* Hide dropdown by default */
    }

    .dropdown-menu.show {
      display: block; /* Show dropdown when active */
    }

  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar d-none d-lg-block" data-color="white" data-active-color="danger">
      <div class="logo">
        <span class="simple-text font-weight-bold">
          JAVA COLLECTION
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->is('karyawan/beranda') ? 'active' : '' }}">
            <a href="{{route('karyawan.beranda')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="{{route('karyawan.presensi')}}">
              <i class="nc-icon nc-touch-id"></i>
              <p>Presensi</p>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#pengajuanDropdown">
              <i class="nc-icon nc-single-copy-04"></i>
              <p class="d-inline-block mr-5">Pengajuan</p>
            </a>
            <div class="collapse" id="pengajuanDropdown">
              <ul class="nav" style="margin-left: 62px;">
                <li>
                  <a href="{{route('karyawan.perizinan')}}">
                    <p>Perizinan</p>
                  </a>
                </li>
                <li>
                  <a href="{{route('karyawan.kasbon')}}">
                    <p>Kasbon</p>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="{{ request()->is('karyawan/gaji') ? 'active' : '' }}">
            <a href="{{route('karyawan.gaji')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Gaji</p>
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

     <!-- Navbar for mobile -->
     <div class="main-panel">
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('karyawan/beranda') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('karyawan.beranda') }}">Beranda</a>
            </li>
            <li class="nav-item {{ request()->is('karyawan/presensi') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('karyawan.presensi') }}">Presensi</a>
            </li>
            <li class="nav-item {{ request()->is('karyawan/perizinan') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('karyawan.perizinan') }}">Perizinan</a>
            </li>
            <li class="nav-item {{ request()->is('karyawan/kasbon') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('karyawan.kasbon') }}">Kasbon</a>
            </li>
            <li class="nav-item {{ request()->is('karyawan/gaji') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('karyawan.gaji') }}">Gaji</a>
            </li>
          </ul>
        </div>
      </nav>

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
              localStorage.removeItem('id'); // Contoh jika ada data user
          }
      </script>

      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Core JS Files -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
  <!-- Notifications Plugin -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard -->
  <script type="module" src="../assets/js/dashboard-employee.js"></script>

  <!--script>
    // Function to toggle the sidebar visibility
    function toggleSidebar() {
      var sidebar = document.querySelector('.sidebar');
      sidebar.classList.toggle('active');
    }
  </script> -->
    <script>
    $(document).ready(function () {
      // Toggle navbar visibility for mobile
      $('.navbar-toggler').click(function () {
        var navbar = $('#navbarNav');
        navbar.toggleClass('show'); // Membuka dan menutup navbar
      });
    
      // Close navbar when clicking outside
      $(document).click(function (e) {
        if (
          !$(e.target).closest('.navbar-toggler').length && 
          !$(e.target).closest('#navbarNav').length
        ) {
          $('#navbarNav').removeClass('show'); // Menutup navbar jika klik di luar
        }
      });
    
      // Toggle dropdown menu for 'Pengajuan' on mobile
      $('.dropdown-toggle').click(function(e) {
        e.preventDefault(); // Mencegah aksi default
        $(this).next('.dropdown-menu').toggleClass('show'); // Menampilkan menu dropdown
      });
    
      // Close dropdown if clicking outside
      $(document).click(function(e) {
        if (!$(e.target).closest('.dropdown-toggle').length) {
          $('.dropdown-menu').removeClass('show'); // Menutup dropdown jika klik di luar
        }
      });
    });
  </script>
</body>

</html>