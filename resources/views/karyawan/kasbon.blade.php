<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Kasbon | JAVA COLLECTION
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/perizinan-modal.css" rel="stylesheet" />
    <link href="../assets/css/pengajuan-modal.css" rel="stylesheet" />
    <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false"
                            data-target="#pengajuanDropdown">
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
                                <li class="active">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

        <!-- Modal Box for Pengajuan Kasbon -->
        <div class="modal fade" id="pengajuanModal" tabindex="-1" role="dialog" aria-labelledby="pengajuanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-title">Formulir Pengajuan Kasbon</h5>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" id="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal:</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </span>
                                <input type="number" id="nominal" class="form-control" min="0" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan:</label>
                            <textarea id="alasan" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn" id="ajukanBtn">Ajukan 
                                <i class="bi bi-caret-right-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <!-- Modal Box for Pembayaran Kasbon -->
        <div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-title">Formulir Pembayaran Kasbon</h5>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" id="tanggal_pembayaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal:</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </span>
                                <input type="number" id="nominal_pembayaran" class="form-control" min="0" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Bukti:</label>
                            <div class="button-container">
                                <button id="btn-tambah" type="button" class="custom-button" data-toggle="modal"
                                    data-target="#lampiranModal">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn" id="kirimPembayaranBtn">Kirim 
                                <i class="bi bi-caret-right-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Box for Tambah Lampiran -->
        <div class="modal fade" id="lampiranModal" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="lampiran-body" enctype="multipart/form-data">
                            <!-- Field untuk Upload File -->
                            <div class="form-group">
                                <label for="fileUpload" class="form-label font-weight-bold">Unggah File Bukti Pembayaran</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileUpload" name="lampiran"
                                            accept="image/*, .pdf, .doc, .docx">
                                        <label class="custom-file-label" for="fileUpload">Pilih file...</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted mt-1">
                                    Dapat mengunggah file dengan format: JPG, PNG, PDF, DOC, DOCX.
                                </small>
                            </div>
                            <!-- Display Nama File -->
                            <div class="form-group">
                                <p id="fileNameDisplay" class="text-secondary"></p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btn-batalLampiran" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success" id="btn-saveLampiran">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Riwayat</h5>
                </div>
            
                <div class="row align-items-start">
                    <!-- Kolom Tombol -->
                    <div class="col-lg-4 col-md-6 mb-3">
                        <button type="button" class="btn w-40 mb-2" data-toggle="modal" data-target="#pengajuanModal"
                            style="background-color: #FFBA6B; border-radius: 18px; font-size: 0.9rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-simple-add mr-2"></i> Ajukan Kasbon
                        </button>
                        <button class="btn w-45" data-toggle="modal" data-target="#pembayaranModal"
                            style="background-color: #FFD7A9; border-radius: 18px; font-size: 0.9rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-money-coins mr-2"></i> Bayar
                        </button>
                    </div>
            
                    <!-- Kolom Card Sisa Limit -->
                    <div class="d-flex justify-content-end col-lg-8 col-md-6">
                        <div class="card shadow-sm w-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <!-- Sisa Limit -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="font-weight-bold">Sisa limit:</span>
                                    <span id="sisaLimit" class="font-weight-bold text-dark">Rp0</span>
                                </div>
                                <!-- Progress Bar -->
                                <div class="progress" style="height: 24px; border-radius: 12px;">
                                    <div id="progressBar"
                                        class="progress-bar bg-danger text-white font-weight-bold text-center"
                                        role="progressbar"
                                        style="width: 0%;"
                                        aria-valuenow="0"
                                        aria-valuemin="0"
                                        aria-valuemax="100">
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
            
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
                                                Tanggal
                                            </th>
                                            <th>
                                                Alasan
                                            </th>
                                            <th>
                                                Nominal
                                            </th>
                                            <th>
                                                Keterangan
                                            </th>
                                            <th class="text-right">
                                                Lampiran
                                            </th>
                                        </thead>
                                        <tbody id="kasbonTableBody" class="text-center">
                                            @if ($riwayatKasbon->isEmpty())
                                                <tr>
                                                    <td colspan="6">Tidak ada pengajuan</td>
                                                </tr>
                                            @else
                                                @foreach ($riwayatKasbon as $riwayat)
                                                    <tr class="text-capitalize">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($riwayat->keterangan === 'Pengajuan')
                                                                {{ \Carbon\Carbon::parse($riwayat->tanggal_pengajuan)->format('Y-m-d') }}
                                                            @elseif ($riwayat->keterangan === 'Pembayaran')
                                                                {{ \Carbon\Carbon::parse($riwayat->tanggal_pembayaran)->format('Y-m-d') }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td>{{ $riwayat->alasan }}</td>
                                                        <td>
                                                            @if ($riwayat->keterangan === 'Pengajuan')
                                                                Rp {{ number_format($riwayat->nominal_diajukan, 0, ',', '.') }}
                                                            @elseif ($riwayat->keterangan === 'Pembayaran')
                                                                {{ $riwayat->nominal_dibayar ? 'Rp ' . number_format($riwayat->nominal_dibayar, 0, ',', '.') : 'Belum Dibayar' }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td>{{ $riwayat->keterangan }}</td>
                                                        <td class="text-right">
                                                            @if ($riwayat->keterangan === 'Pembayaran')
                                                                <div class="button-container">
                                                                    <button type="button" class="custom-button">
                                                                        <a href="" target="_blank" class="text-decoration-none text-dark" 
                                                                        id="modal-lampiran" data-keterangan="{{ $riwayat->keterangan }}" 
                                                                        data-lampiran="{{ asset($riwayat->lampiran) }}">
                                                                            Lihat</a>
                                                                    </button>
                                                                </div>
                                                            @endif
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
            <footer class="footer">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
                demo.initChartsPages();
            });

            $(document).ready(function () {
                $('#ajukanBtn').on('click', function () {
                    // Collect form data
                    var tanggal = $('#tanggal').val();
                    var nominal = $('#nominal').val();
                    var alasan = $('#alasan').val();

                    // Validate the data before sending
                    if (!tanggal || !nominal || !alasan) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Pastikan semua data terisi',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        });
                        return;
                    }

                    // Send data via AJAX to the backend
                    $.ajax({
                        url: '{{ route('kasbon.save') }}', // Route to submit data
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            tanggal_pengajuan: tanggal,
                            nominal_diajukan: nominal,
                            alasan: alasan,
                        },
                        success: function (response) {
                            $('#pengajuanModal').modal('hide'); // Close the modal
                            Swal.fire({
                                title: 'Pengajuan kasbon berhasil!',
                                text: response.success,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                willClose: () => {
                                    // Reload halaman setelah SweetAlert tertutup
                                    location.reload();
                                }
                            }).then(() => {
                                // Update nilai sisa limit di frontend
                                $('#sisaLimit').text(response.sisa_limit.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                                // Update progress bar
                                $('#progressBar').css('width', persentase + '%');
                                $('#progressBar').attr('aria-valuenow', persentase);
                                $('#progressBar').text(kasbonAktif.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                            });
                        },
                        error: function (response) {
                            $('#pengajuanModal').modal('hide');
                            Swal.fire({
                                title: 'Gagal!',
                                text: response.responseJSON ? response.responseJSON.message : 'Pengajuan kasbon gagal.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                            });
                        }
                    });
                });
            });

            $(document).ready(function () {
                function updateSisaLimit() {
                    $.ajax({
                        url: '{{ route('kasbon.limit') }}', // Sesuaikan dengan route backend Anda
                        method: 'GET',
                        success: function (response) {
                            const limitAwal = response.limit_awal; // Limit awal dari backend
                            const sisaLimit = response.sisa_limit; // Sisa limit dari backend
                            const kasbonAktif = limitAwal - sisaLimit;

                            // Hitung persentase progress
                            const persentase = Math.min((kasbonAktif / limitAwal) * 100, 100).toFixed(2);

                            // Update teks sisa limit
                            $('#sisaLimit').text(sisaLimit.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));

                            // Update progress bar
                            $('#progressBar').css('width', persentase + '%');
                            $('#progressBar').attr('aria-valuenow', persentase);
                            $('#progressBar').text(kasbonAktif.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                        },
                        error: function () {
                            Swal.fire({
                                title: 'Gagal!',
                                text: response.responseJSON ? response.responseJSON.message : 'Gagal mengambil limit.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                            });
                        },
                    });
                }

                // Panggil fungsi saat halaman dimuat
                updateSisaLimit();
            });

            $(document).ready(function () {
                let uploadedFile = null;  // Menyimpan lampiran sementara

                // Menampilkan nama file setelah dipilih
                $('#fileUpload').on('change', function () {
                    const fileName = this.files[0]?.name || 'Tidak ada file yang dipilih';
                    $(this).next('.custom-file-label').text(fileName);

                    uploadedFile = this.files[0];
                });

                // Saat tombol "Simpan Lampiran" diklik
                $('#btn-saveLampiran').on('click', function () {
                    if (!uploadedFile) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Peringatan',
                            text: 'Tidak ada file lampiran yang diunggah!',
                        });
                    } else {
                        const fileName = uploadedFile.name;
                        $('#btn-tambah').text('Ganti File');  // Ganti teks tombol dengan nama file
                        // Pastikan tombol hanya muncul jika file diunggah
                        $('#btn-fileName').remove(); // Menghapus tombol lama (jika ada)
                        $('#btn-tambah').before(`
                            <button id="btn-fileName" class="btn btn-info mt-2" disabled>${fileName}</button>
                        `);
                        
                        $('#lampiranModal').modal('hide');
                    }
                });

                $('#btn-batalLampiran').on('click', function () {
                    $('#lampiranModal').modal('hide');
                    $('.custom-file-label').text('Pilih file...');
                    $('#fileUpload').val(''); // Mengosongkan nilai input file
                });
                
                $('#kirimPembayaranBtn').on('click', function () {
                    // Pastikan tanggal, nominal, dan lampiran diambil dengan benar
                    var tanggal = $('#tanggal_pembayaran').val();
                    var nominal = $('#nominal_pembayaran').val();
                    var buktiBayar = uploadedFile // Ambil file pertama dari input file

                    // Validate the data before sending
                    if (!tanggal || !nominal || !buktiBayar) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Pastikan semua data terisi',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        });
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var lampiranBase64 = e.target.result.split(',')[1];

                        // Kirim data menggunakan AJAX
                        $.ajax({
                            url: '{{ route('kasbon.payment') }}', // Ganti dengan route yang sesuai
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}', // Tambahkan CSRF token jika diperlukan
                                tanggal_pembayaran: tanggal,
                                nominal_pembayaran: nominal,
                                lampiran: lampiranBase64,
                                lampiran_nama: buktiBayar.name,
                            },
                            success: function (response) {
                                $('#pembayaranModal').modal('hide');
                                Swal.fire({
                                    title: 'Pembayaran Berhasil!',
                                    text: response.success,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    willClose: () => {
                                        // Reload halaman setelah SweetAlert tertutup
                                        location.reload();
                                    }
                                });
                            },
                            error: function (response) {
                                $('#pembayaranModal').modal('hide');
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: response.responseJSON ? response.responseJSON.message : 'Terjadi kesalahan. Silakan coba lagi.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                            }
                        });
                    };
                    reader.readAsDataURL(buktiBayar);
                });

                const button = document.querySelector('.custom-button a');
                const lampiran = button.getAttribute('data-lampiran');

                if (lampiran) {
                    const modalLampiran = document.getElementById('modal-lampiran');
                    modalLampiran.href = lampiran; // Set href dengan URL file yang ada
                } else {
                    alert('Lampiran tidak ditemukan!');
                }
            });
        </script>
    </div>
</body>

</html>