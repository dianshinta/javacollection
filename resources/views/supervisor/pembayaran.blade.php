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
  <link href="../assets/css/supervisor-pembayaran.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <!-- MENU -->
            @include('supervisor.menu')
            {{-- <div class="sidebar-wrapper">
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
            </div> --}}
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
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Daftar Pembayaran</h5>
                </div>

                <div class="row align-items-start">
                    <!-- Main Content -->
                    <div class="col-md-12">
                        <!-- Pencarian -->
                        <form method="GET" action="{{ route('supervisor.pembayaran') }}"  class="d-flex">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search-bar" name="search" id="searchBar" placeholder="Cari Karyawan..">
                                <span>
                                    <button type="submit" class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <!-- Tabel Pembayaran -->
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Nominal Bayar</th>
                                                <th>Gaji</th>
                                                <th>Status Kasbon</th>
                                                <th>Status Bayar</th>
                                                <th>Lampiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Jika data kosong -->
                                            @if ($pembayaran->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada pembayaran</td>
                                            </tr>
                                            @else
                                                <!-- Looping data pembayaran -->
                                                @foreach($pembayaran as $data)
                                                <tr>
                                                    <td>{{ $data->nip }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_pembayaran)->translatedFormat('j F Y') }}</td>
                                                    <td>{{ 'Rp ' . number_format($data->nominal_dibayar, 0, ',', '.') }}</td>
                                                    <td>{{ 'Rp ' . number_format($data->karyawan->gaji_pokok, 0, ',', '.') }}</td> 
                                                    <td>
                                                        <!-- Status Kasbon -->
                                                        @if ($data->status_kasbon === 'Lunas')
                                                            <span class="badge bg-success">Lunas</span>
                                                        @else
                                                            <span class="badge bg-danger">Belum Lunas</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                         <!-- Status Pembayaran -->
                                                        @if ($data->status_bayar === 'Diproses')
                                                            <span class="badge bg-warning">Diproses</span>
                                                        @elseif ($data->status_bayar === 'Disetujui')
                                                            <span class="badge bg-success">Disetujui</span>
                                                        @else
                                                            <span class="badge bg-danger">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                         <!-- Tombol Lihat Lampiran -->
                                                        <a href="#" 
                                                        class="btn btn-info btn-round" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#pembayaranModal"
                                                        data-id="{{ $data->id }}"
                                                        data-nip="{{ $data->nip }}"
                                                        data-nama="{{ $data->nama }}"
                                                        data-tanggal-bayar="{{ \Carbon\Carbon::parse($data->tanggal_pembayaran)->translatedFormat('j F Y') }}"
                                                        data-nominal-dibayar="{{ $data->nominal_dibayar }}"
                                                        data-saldo-akhir="{{ $data->saldo_akhir }}"
                                                        data-status-bayar="{{ $data->status_bayar }}"
                                                        data-status-kasbon="{{ $data->status_kasbon }}"
                                                        data-lampiran="{{ asset($data->lampiran) }}"
                                                        data-gaji-pokok="{{ preg_replace('/[^0-9]/', '', $data->karyawan->gaji_pokok ?? 0) }}">
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
                                        {{ $pembayaran->links('pagination::bootstrap-4') }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        

            <!-- Modal -->
            <div class="modal fade" id="pembayaranModal" tabindex="-1" aria-labelledby="pembayaranModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>    
                    </div>
                    <h5 class="modal-title" id="pembayaranModalLabel">Pembayaran Kasbon</h5>
                    <div class="modal-body">
                        <!-- Detail Data Pembayaran -->
                        <div class="row mb-2">
                            <div class="col-5 label-bold">NIP:</div>
                            <div class="col-7 bg-gray" id="modal-nip"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Nama:</div>
                            <div class="col-7 bg-gray" id="modal-nama"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Tanggal:</div>
                            <div class="col-7 bg-gray" id="modal-tanggal-bayar"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Nominal Pembayaran:</div>
                            <div class="col-7 bg-gray" id="modal-nominal-dibayar"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Limit Kasbon:</div>
                            <div class="col-7" id="modal-saldo-akhir"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Gaji Pokok:</div>
                            <div class="col-7" id="modal-gaji-pokok"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Bukti Pembayaran:</div>
                            <a href="#" target="_blank" class="btn btn-sm btn-light ml-3 mt-1" id="modal-lampiran">
                                Preview </a>
                        </div>
                        <div class="container mt-5 text-center">
                            <div class="btn-group-custom justify-content-center">
                                <!-- Tombol Terima -->
                                <button class="btn btn-rounded btn-accept" id="btnTerima">
                                    Terima Pembayaran </button>
                                <!-- Tombol Tolak -->
                                <button class="btn btn-rounded btn-reject" id="btnTolak">
                                    Tolak Pembayaran </button>
                            </div>
                        </div>                  
                    </div>
                </div>
                </div>
            </div>

            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header"> 
                    </div>
                    <div class="modal-body">
                        <p id="confirmMessage"></p>  <!--Text confirm-->
                        <div class="text-center">
                            <button type="button" class="btn btn-success" id="btnYakin">Ya, Terima</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- end Content -->
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

    <!-- JavaScript -->
    <script>
        //fungsi format rupiah 
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        // Event untuk menampilkan data di modal
        document.addEventListener('DOMContentLoaded', function(){
            const pembayaranModal = document.getElementById('pembayaranModal');

            pembayaranModal.addEventListener('show.bs.modal', function(event){
                // Tombol yang memicu modal
                const button = event.relatedTarget;

                // Ambil data dari tombol
                const id = button.getAttribute('data-id');
                const nip = button.getAttribute('data-nip');
                const nama = button.getAttribute('data-nama');
                const tanggalBayar = button.getAttribute('data-tanggal-bayar');
                const nominalDibayar = button.getAttribute('data-nominal-dibayar');
                const saldoAkhir = button.getAttribute('data-saldo-akhir');
                const statusBayar = button.getAttribute('data-status-bayar'); // Ambil status bayar
                const statusKasbon = button.getAttribute('data-status-kasbon'); // Ambil status kasbon
                const lampiran = button.getAttribute('data-lampiran');
                const gajiPokok = button.getAttribute('data-gaji-pokok');

                // Log nilai mentah
                // console.log('Data Gaji Pokok (mentah):', gajiPokok);

                // Parse nilai
                const parsedGajiPokok = parseInt(gajiPokok);

                // Log nilai setelah parsing
                // console.log('Data Gaji Pokok (parsed):', parsedGajiPokok);

                // Format nominal dengan Rp
                const formattedNominalDibayar = formatRupiah(nominalDibayar);
                const formattedSaldoAkhir = formatRupiah(saldoAkhir);
                const formattedGajiPokok = formatRupiah(parsedGajiPokok);

                // Isi elemen modal dengan data
                document.getElementById('modal-nip').textContent = nip;
                document.getElementById('modal-nama').textContent = nama;
                document.getElementById('modal-tanggal-bayar').textContent = tanggalBayar;
                document.getElementById('modal-nominal-dibayar').textContent = formattedNominalDibayar;
                document.getElementById('modal-saldo-akhir').textContent = formattedSaldoAkhir;
                document.getElementById('modal-gaji-pokok').textContent = formattedGajiPokok;

                // Simpan status bayar dan status kasbon di modal sebagai atribut data
                pembayaranModal.setAttribute('data-status-bayar', statusBayar);
                pembayaranModal.setAttribute('data-status-kasbon', statusKasbon);
                pembayaranModal.setAttribute('data-id', id);
                pembayaranModal.setAttribute('data-gaji-pokok', gajiPokok);

                // Update link di modal
                const modalLampiran = document.getElementById('modal-lampiran');
                if (lampiran) {
                    modalLampiran.href = lampiran; // Path file untuk unduhan
                    modalLampiran.style.display = 'inline'; // Tampilkan tombol
                } else {
                    modalLampiran.style.display = 'none'; // Sembunyikan tombol jika lampiran kosong
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const btnTerima = document.getElementById('btnTerima');
            const btnTolak = document.getElementById('btnTolak');
            const btnYakin = document.getElementById('btnYakin');
            const modalNip = document.getElementById('modal-nip');
            const pembayaranModal = document.getElementById('pembayaranModal');
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            const confirmMessage = document.getElementById('confirmMessage');

            let actionToPerform = ''; // Menyimpan status yang dipilih (Terima/Tolak)
            let id = '';

            // Event untuk tombol "Terima Pembayaran"
            btnTerima.addEventListener('click', function () {
                // nip = modalNip.textContent.trim();
                id = pembayaranModal.getAttribute('data-id');
                actionToPerform = 'terima';
                confirmMessage.textContent = 'Terima pembayaran ini?';
                confirmModal.show();
            });

            // Event untuk tombol "Tolak Pembayaran"
            btnTolak.addEventListener('click', function () {
                // nip = modalNip.textContent.trim();
                id = pembayaranModal.getAttribute('data-id');
                actionToPerform = 'tolak';
                confirmMessage.textContent = 'Tolak pembayaran ini?';
                confirmModal.show();
            });

            // Event untuk tombol "Yakin"
            btnYakin.addEventListener('click', function () {
                if (actionToPerform === 'terima') {
                    const statusBayar = pembayaranModal.getAttribute('data-status-bayar').toLowerCase();
                    const statusKasbon = pembayaranModal.getAttribute('data-status-kasbon').toLowerCase();
                    const saldo = parseInt(document.getElementById('modal-saldo-akhir').textContent.replace(/[^0-9-]/g, ''));
                    const nominalPembayaran = parseInt(document.getElementById('modal-nominal-dibayar').textContent.replace(/[^0-9]/g, ''));
                    const gajipokok = parseInt(pembayaranModal.getAttribute('data-gaji-pokok'));
                    
                    // console.log('Status Bayar:', statusBayar);
                    // console.log('Status Kasbon:', statusKasbon);
                    // console.log('Nominal bayar:', nominalPembayaran);
                    // console.log('Saldo:', saldo);
                    // console.log('Gaji pokok:', gajipokok);

                    // 1. Validasi: Status sudah disetujui atau ditolak
                    if (statusBayar === 'disetujui' || statusBayar === 'ditolak') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Tidak Valid',
                            text: 'Status sudah pernah disetujui/ditolak',
                            confirmButtonText: 'OK',
                        });
                        return; // Hentikan proses
                    }

                    // Validasi 2: Limit kasbon sudah melebihi 2 juta
                    if (saldo >= gajipokok) {
                        // console.log('Validasi gagal: Saldo >= Gaji Pokok');
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Tidak Valid',
                            text: 'Limit kasbon sudah mencapai maksimum dan Kasbon Telah Lunas.',
                            confirmButtonText: 'OK',
                        });
                        return; // Hentikan proses
                    }

                    // Validasi 3: Nominal pembayaran melebihi saldo kasbon
                    if (saldo + nominalPembayaran > gajipokok) {
                        // console.log('Validasi gagal: Saldo + Nominal Pembayaran > Gaji Pokok');
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Tidak Valid',
                            text: 'Pembayaran yang dilakukan melebihi limit kasbon.',
                            confirmButtonText: 'OK',
                        });
                        return; // Hentikan proses
                    }
                }

                // Jika validasi lolos, proses pembayaran
                processPayment(actionToPerform, id);
            });

            // Fungsi untuk memproses pembayaran
            function processPayment(action, id) {
                fetch(`/kasbon/${encodeURIComponent(id)}/update`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ action }),
                })
                    .then((response) => {
                        if (response.status === 403) {
                            return response.json().then((data) => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Pembayaran Tidak Valid',
                                    text: data.message,
                                    confirmButtonText: 'OK',
                                });
                                throw new Error(data.message); // Hentikan eksekusi lebih lanjut
                            });
                        }

                        if (!response.ok) {
                            throw new Error('Kesalahan jaringan atau server.');
                        }
                        return response.json();
                    })
                    .then((data) => {
                        confirmModal.hide(); // Tutup modal setelah sukses
                        Swal.fire({
                            title: 'Sukses',
                            text: data.message,
                            icon: 'success',
                        }).then(() => {
                            window.location.reload();
                        });
                    })
                    .catch((error) => {
                        console.error('Error:', error.message);
                        Swal.fire({
                            title: 'Error',
                            text: error.message || 'Terjadi kesalahan saat memproses data.',
                            icon: 'error',
                        });
                    });
            }

            // Close modal by clicking the close button only
            $('.close').on('click', function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    </script>
</body>
</html>
