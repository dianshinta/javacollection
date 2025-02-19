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
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/supervisor-beranda.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- CSS for Mobile Phone -->
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
        color: lightgrey !important;
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
      <!-- Head Role -->
      <div class="sidebar d-none d-lg-block" data-color="white" data-active-color="danger">
        <div class="logo">
          <span class="simple-text font-weight-bold">
          JAVA COLLECTION
          </span>
        </div>   

        <!--  MENU -->  
          @include('supervisor.menu')
        <!-- END MENU -->  
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
        
      <!-- Content -->
      <div class="main-panel">
        <div class="content">
            <div class="mb-4">
            <small class="text-muted d-block">Beranda</small>
            <h5 class="font-weight-bold">Selamat datang!</h5>
            </div>
            <!-- Nama, Hari, dan Lokasi -->
            <div>
                <div class="d-flex justify-content-start align-items-center gap-4 mb-4">
                    <div class="d-flex align-items-center mr-5">
                        <i class="nc-icon nc-circle-10 text-primary mr-2"></i>          
                        <div>
                            <span  style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ Auth::user()->name }}</span>
                            <small class="text-muted d-block">{{ Auth::user()->nip }}</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mr-5">
                        <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
                        <div>
                            <span>{{ \Carbon\Carbon::now()->translatedFormat('l') }}</span> <!-- Nama Hari -->
                            <small class="text-muted d-block">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small> <!-- Tanggal -->
                        </div>
                    </div> 
                </div>
            </div>
            <hr>
            <!-- Cabang -->
            <div class="cabang">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card">
                        <div class="card-body ">
                          <div class="selected-menu">
                            <div class="selected-btn">
                              <span class="sBtn-text"></span>
                              <i class="bx bx-chevron-down"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- Dropdown Cabang -->
                <div class="overlay" id="overlay-cabang">
                    <ul class="options">
                        <li class="option" id="option-first">
                            <span class="option-text">Cabang A</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Cabang B</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Cabang C</span>
                        </li>
                        <li class="option" id="option-last">
                            <span class="option-text">Cabang D</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Grafik Mingguan -->
            <div class="row">
                <div class="col-md-8">
                  <div class="card card-chart">
                    <div class="card-header">
                      <h5 class="card-title">
                        Kehadiran<br>
                        Karyawan
                      </h5>
                      <p class="card-category">Mingguan</p>
                    </div>
                    <div class="card-body">
                      <canvas id="barChart"></canvas>
                    </div>
                    <div class="card-footer ">
                      <div class="legend">
                        <div class="legend-list">
                          <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                        </div>
                        <div class="legend-list">
                          <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Grafik Bulanan -->
                <div class="col-md-4">
                  <div class="card ">
                    <div class="card-header ">
                      <h5 class="card-title">
                        Kehadiran<br>
                        Karyawan
                      </h5>
                      <p class="card-category" id="currentMonth"></p>
                    </div>
                    <div class="card-body ">
                      <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="card-footer ">
                      <div class="legend">
                        <div class="legend-list">
                          <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                        </div>
                        <div class="legend-list">
                          <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="row">
              <p class="font-weight-bold" style="margin-left: 1rem; margin-bottom: 0.5rem; font-size: 1.2rem;">Riwayat</p>
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table">
                                  <thead class="text-primary">
                                      <th>Nama</th>
                                      <th>Status</th>
                                      <th>Waktu</th>
                                  </thead>
                                  <tbody id="data-table-body">
                                      <!-- Data akan diisi secara dinamis -->
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <!-- End Content -->
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script type="module" src="../assets/js/dashboard-supervisor.js"></script>
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
        });
    </script>
</body>
</html>
