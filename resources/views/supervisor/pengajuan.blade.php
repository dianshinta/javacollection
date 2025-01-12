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
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/supervisor-pengajuan.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
        <div class="sidebar d-none d-lg-block" data-color="white" data-active-color="danger">
              <div class="logo">
                <span class="simple-text font-weight-bold">
                JAVA COLLECTION
                </span>
            </div>
            
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

        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Daftar Pengajuan</h5>
                </div>

                <div class="row align-items-start">
                    <!-- Main Content -->
                    <div class="col-md-12">
                        <!-- Pencarian -->
                        <form method="GET" action="{{ route('supervisor.pengajuan') }}" class="d-flex">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search-bar" name="search" id="searchBar" placeholder="Cari Karyawan..">
                                <span>
                                    <button type="submit" class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="gaji-row" id="tableBody">
                                            @if ($pengajuan->isEmpty())
                                                <tr>
                                                    <td colspan="6">Tidak ada pengajuan</td>
                                                </tr>
                                            @else
                                                @foreach ($pengajuan as $riwayat)
                                                    <tr class="text-capitalize">
                                                        <td>{{ $riwayat->nip }}</td>
                                                        <td>{{ $riwayat->nama }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_pengajuan)->translatedFormat('j F Y') }}</td>
                                                        <td>{{ 'Rp ' . number_format($riwayat->nominal_diajukan, 0, ',', '.') }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info btn-round" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#kasbonModal"
                                                            data-nip="{{ $riwayat->nip }}" 
                                                            data-nama="{{ $riwayat->nama }}" 
                                                            data-tanggal="{{ \Carbon\Carbon::parse($riwayat->tanggal_pengajuan)->translatedFormat('j F Y') }}"
                                                            data-alasan="{{ $riwayat->alasan }}" 
                                                            data-pengajuan="Rp {{ number_format($riwayat->nominal_diajukan, 0, ',', '.') }}" 
                                                            data-limit="Rp {{ number_format($riwayat->saldo_akhir, 0, ',', '.') }}">
                                                            <i class="bi bi-eye"></i> Lihat
                                                            </a>
                                                        </td>                                                    
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="kasbonModal" tabindex="-1" aria-labelledby="kasbonModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-capitalize">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>    
                        </div>
                        <h5 class="modal-title" id="kasbonModalLabel">Pengajuan Kasbon</h5>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-5 label-bold">NIP:</div>
                                <div class="col-7 bg-gray" id="modalNip"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Nama:</div>
                                <div class="col-7 bg-gray" id="modalNama"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Tanggal:</div>
                                <div class="col-7 bg-gray" id="modalTanggal"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Alasan:</div>
                                <div class="col-7" id="modalAlasan"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Nominal Pengajuan:</div>
                                <div class="col-7" id="modalPengajuan"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Limit Kasbon:</div>
                                <div class="col-7 bg-gray" id="modalLimit"></div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

        </div>
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
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const kasbonModal = document.getElementById('kasbonModal');
        kasbonModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Tombol yang memicu modal
            // Ambil data dari atribut tombol
            const nip = button.getAttribute('data-nip');
            const nama = button.getAttribute('data-nama');
            const tanggal = button.getAttribute('data-tanggal');
            const alasan = button.getAttribute('data-alasan');
            const pengajuan = button.getAttribute('data-pengajuan');
            const limit = button.getAttribute('data-limit');
            
            // Masukkan data ke dalam modal
            document.getElementById('modalNip').textContent = nip;
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalTanggal').textContent = tanggal;
            document.getElementById('modalAlasan').textContent = alasan;
            document.getElementById('modalPengajuan').textContent = pengajuan;
            document.getElementById('modalLimit').textContent = limit;
        });
    </script>
</body>
</html>