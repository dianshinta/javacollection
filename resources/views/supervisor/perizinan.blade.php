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
  <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        <!-- Content -->
        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Perizinan</small>
                    <h5 class="font-weight-bold">Daftar Perizinan</h5>
                </div>
                <div class="row align-items-start">
                    <!-- Main Content -->
                    <div class="col-md-12">
                        <!-- Pencarian -->
                        <form method="GET" action="{{ route('supervisor.perizinan') }}" class="d-flex">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search-bar" name="search" id="searchBar" placeholder="Cari Karyawan.." value="{{ $search ?? '' }}" >
                                <span>
                                    <button type="submit" class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        
                        <!-- Tabel Perizinan -->
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Lampiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($perizinan->isEmpty())
                                                <tr>
                                                    <td colspan="6">Tidak ada perizinan</td>
                                                </tr>
                                            @else
                                                @foreach($perizinan as $data)
                                                    <tr>
                                                        <td>{{ $data->nip }}</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td>{{ $data->tanggal->translatedFormat('j F Y') }}</td>
                                                        <td>
                                                            @if ($data->status === 'Diproses')
                                                                <span class="badge bg-warning">Diproses</span>
                                                            @elseif ($data->status === 'Disetujui')
                                                                <span class="badge bg-success">Disetujui</span>
                                                            @else
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" 
                                                            class="btn btn-info btn-round" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#perizinanModal"
                                                            data-id="{{ $data->id }}"
                                                            data-nip="{{ $data->nip }}"
                                                            data-nama="{{ $data->nama }}"
                                                            data-tanggal="{{ $data->tanggal->translatedFormat('j F Y') }}"
                                                            data-jenis="{{ $data->jenis }}"
                                                            data-keterangan="{{ $data->keterangan }}"
                                                            data-lampiran="{{ $data->lampiran }}">
                                                                <i class="bi bi-eye"></i> Lihat
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody> 
                                    </table>
                                </div>

                                <!-- Tambahkan pagination -->
                                <div class="d-flex justify-content-center">
                                    <nav>
                                        {{ $perizinan->links('pagination::bootstrap-4') }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        

            <!-- Modal -->
            <div class="modal fade" id="perizinanModal" tabindex="-1" aria-labelledby="perizinanModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>    
                    </div>
                    <h5 class="modal-title" id="perizinanModalLabel">Formulir Perizinan</h5>
                    <div class="modal-body">
                        <!-- Hidden Input for ID -->
                        <input type="hidden" id="modal-id">

                        <!-- Detail NIP -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">NIP:</div>
                            <div class="col-7 bg-gray" id="modal-nip"></div>
                        </div>

                        <!-- Detail Nama -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Nama:</div>
                            <div class="col-7 bg-gray" id="modal-nama"></div>
                        </div>

                        <!-- Detail Tanggal -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Tanggal:</div>
                            <div class="col-7 bg-gray" id="modal-tanggal"></div>
                        </div>

                        <!-- Detail Jenis -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Jenis:</div>
                            <div class="col-7 bg-gray" id="modal-jenis"></div>
                        </div>

                        <!-- Keterangan -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Keterangan:</div>
                            <div class="col-7">
                                <textarea class="form-control" rows="4" id="modal-keterangan" disabled>Izin sakit flu dan demam</textarea>
                            </div>
                        </div>

                        <!-- Lampiran -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Lampiran:</div>
                            <a href="#" target="_blank" class="btn btn-sm btn-secondary ml-3" id="modal-lampiran">
                                Preview </a>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="container mt-5 text-center">
                            <div class="btn-group-custom justify-content-center">
                            <!-- Tombol Terima -->
                            <button class="btn btn-rounded btn-accept" id="btnTerima">
                                Terima Perizinan </button>
                            <!-- Tombol Tolak -->
                            <button class="btn btn-rounded btn-reject" id="btnTolak">
                                Tolak Perizinan </button>
                            </div>
                        </div>                  
                    </div>
                </div>
                </div>
            </div>

            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="confirmMessage"></p> <!--Text confirm-->
                            <div class="text-center">
                                <button type="button" class="btn btn-success" id="btnYakin">Yakin</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnBatal">Batal</button>
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
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
        });
    </script>

  <!-- JavaScript -->
    <script>
        // Event untuk menampilkan data di modal
        document.addEventListener('DOMContentLoaded', function(){
            const perizinanModal = document.getElementById('perizinanModal');

            perizinanModal.addEventListener('show.bs.modal', function(event){
                // Tombol yang memicu modal
                const button = event.relatedTarget;

                // Ambil data dari tombol
                const id = button.getAttribute('data-id');
                const nip = button.getAttribute('data-nip');
                const nama = button.getAttribute('data-nama');
                const tanggal = button.getAttribute('data-tanggal');
                const jenis = button.getAttribute('data-jenis');
                const keterangan = button.getAttribute('data-keterangan');
                const lampiran = button.getAttribute('data-lampiran');

                // Isi elemen modal dengan data
                document.getElementById('modal-id').value = id;
                document.getElementById('modal-nip').textContent = nip;
                document.getElementById('modal-nama').textContent = nama;
                document.getElementById('modal-tanggal').textContent = tanggal;
                document.getElementById('modal-jenis').textContent = jenis;
                document.getElementById('modal-keterangan').value = keterangan;

                // Update link di modal
                const modalLampiran = document.getElementById('modal-lampiran');
                if (lampiran) {
                    modalLampiran.href = `/storage/${lampiran}`; // Path file untuk unduhan
                    modalLampiran.style.display = 'inline'; // Tampilkan tombol
                } else {
                    modalLampiran.style.display = 'none'; // Sembunyikan tombol jika lampiran kosong
                }
            });
        });

        // Event melakukan updatestatus
        document.addEventListener('DOMContentLoaded', function () {
            const btnTerima = document.getElementById('btnTerima');
            const btnTolak = document.getElementById('btnTolak');
            const btnYakin = document.getElementById('btnYakin');
            const modalNip = document.getElementById('modal-nip');
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            const confirmMessage = document.getElementById('confirmMessage'); // Elemen <p> di modal
            let selectedStatus = ''; // Menyimpan status yang dipilih (Disetujui/Ditolak)

            // Event untuk tombol "Terima Perizinan"
            btnTerima.addEventListener('click', function () {
                selectedStatus = 'Disetujui';
                confirmMessage.textContent = 'Apakah Anda yakin ingin menerima perizinan ini?'; // Ubah pesan
                confirmModal.show(); // Tampilkan modal konfirmasi
            });

            // Event untuk tombol "Tolak Perizinan"
            btnTolak.addEventListener('click', function () {
                selectedStatus = 'Ditolak';
                confirmMessage.textContent = 'Apakah Anda yakin ingin menolak perizinan ini?'; // Ubah pesan
                confirmModal.show(); // Tampilkan modal konfirmasi
            });

            // Event untuk tombol "Yakin" di modal konfirmasi
            btnYakin.addEventListener('click', function () {
                const id = document.getElementById('modal-id').value; // Ambil ID dari modal
                updateStatus(id, selectedStatus); // Kirim ID ke server
            });

            // fungsi 
            function updateStatus(id, status) {
                fetch('/perizinan/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ id: id, status: status }) // Kirim ID dan status
                })
                // .then(response => {
                //     console.log(response); // Tambahkan ini untuk memeriksa status response
                //     return response.json();
                // })
                // .then(data => {
                //     console.log(data); // Tambahkan ini untuk melihat data yang diterima
                // })
                // .catch(error => {
                //     console.error('Error:', error); // Tangkap error yang terjadi
                // });
                .then(response => {
                    if (response.status === 403) {
                        // Jika status adalah 403, baca pesan error dari server
                        return response.json().then(data => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Memperbarui Status',
                                text: data.message,
                                confirmButtonText: 'OK'
                            });
                        });
                    } else if (response.ok) {
                        return response.json().then(data => {
                            // Menampilkan pesan sukses dengan SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message || 'Status berhasil diperbarui.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload(); // Reload halaman untuk memperbarui tabel
                            });
                        });
                    } else {
                        throw new Error('Terjadi kesalahan saat memperbarui status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Terjadi kesalahan saat memperbarui status');
                    // Menampilkan pesan error dengan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui status.',
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    </script>
</body>

</html>


