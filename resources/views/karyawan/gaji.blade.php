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
        <div class="wrapper">
          <div class="sidebar d-none d-lg-block" data-color="white" data-active-color="danger">
            <div class="logo">
              <span class="simple-text font-weight-bold">
                JAVA COLLECTION
              </span>
            </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li class="">
                  <a href="{{route('karyawan.beranda')}}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>Beranda</p>
                  </a>
                </li>
                <li class="">
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
                <li class="active">
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
              <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <!-- Beranda -->
                <li class="nav-item {{ request()->is('karyawan/beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('karyawan.beranda') }}">
                    <i class="nc-icon nc-layout-11"></i> Beranda
                    </a>
                </li>
            
                <!-- Presensi -->
                <li class="nav-item {{ request()->is('karyawan/presensi') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('karyawan.presensi') }}">
                    <i class="nc-icon nc-touch-id"></i> Presensi
                    </a>
                </li>
            
                <!-- Dropdown Pengajuan -->
                <li class="nav-item dropdown {{ request()->is('karyawan/perizinan') || request()->is('karyawan/kasbon') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="pengajuanDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nc-icon nc-single-copy-04"></i> Pengajuan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pengajuanDropdown">
                    <a class="dropdown-item {{ request()->is('karyawan/perizinan') ? 'active' : '' }}" href="{{ route('karyawan.perizinan') }}">Perizinan</a>
                    <a class="dropdown-item {{ request()->is('karyawan/kasbon') ? 'active' : '' }}" href="{{ route('karyawan.kasbon') }}">Kasbon</a>
                    </div>
                </li>
            
                <!-- Gaji -->
                <li class="nav-item {{ request()->is('karyawan/gaji') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('karyawan.gaji') }}">
                    <i class="nc-icon nc-money-coins"></i> Gaji
                    </a>
                </li>
                </ul>
            </div>
            </nav>
          <!-- <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
             
              <span class="simple-text font-weight-bold">
                JAVA COLLECTION
              </span>
            </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li>
                  <a href="{{route('karyawan.beranda')}}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>Beranda</p>
                  </a>
                </li>
                <li class="active">
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
                        <a href="{{route('karyawan.perizinan')}}" ">
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
                
                <li>
                  <a href="{{route('karyawan.gaji')}}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Gaji</p>
                  </a>
                </li>
              </ul>
            </div>
          </div> -->

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

          <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Gaji</small>
                    <h5 class="font-weight-bold">Riwayat</h5>
                </div>
            
                <div class="row align-items-start">         
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center text-primary">
                                            <th>
                                                No
                                            </th>
                                            <th>
                                                Bulan
                                            </th>
                                            <th>
                                                Tahun
                                            </th>
                                            <th>
                                                Nominal
                                            </th>
                                            <th class="text-right">
                                                Slip Gaji
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Januari
                                                </td>
                                                <td>
                                                    2025
                                                </td>
                                                <td>
                                                    3000000
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Unduh
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Kelompok 1 - RPL
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
        <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
                demo.initChartsPages();
            });
        </script>
</body>
</html>