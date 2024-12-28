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
                    <li>
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
            </div>
        </div>

        <!-- Modal Box for Tambah Lampiran -->
        <div class="modal fade" id="lampiranModal" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="modalHeader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title pb-3" id="bonusModalLabel">Tambah Lampiran</h5>
                        <form class="lampiran-body" enctype="multipart/form-data">
                            <!-- Field untuk Upload File -->
                            <div class="form-group">
                                <label for="fileUpload" class="file-label">Pilih File</label>
                                <input type="file" class="form-control" id="fileUpload" name="fileUpload"
                                    accept="image/*, .pdf, .doc, .docx" style="display: none;">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-save" id="saveLampiran">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
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
                        <form id="kasbonPaymentForm" enctype="multipart/form-data">
                            @csrf

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
                                <label for="lampiran">Bukti:</label>
                                <div class="button-container">
                                    <input type="file" id="lampiran" class="custom-button form-control">
                                        Tambah
                                    </input>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn" id="kirimPembayaranBtn">Kirim 
                                    <i class="bi bi-caret-right-fill"></i>
                                </button>
                            </div>
                        </form>
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
                                            @foreach ($riwayatPengajuanKasbon as $riwayat)
                                                <tr class="text-capitalize">
                                                    <td>{{ $loop->iteration }}</td>  <!-- Corrected: use $loop->iteration for auto-increment -->
                                                    <td>{{ $riwayat->tanggal_pengajuan }}</td>
                                                    <td>{{ $riwayat->alasan }}</td>
                                                    <td>{{ $riwayat->nominal_diajukan }}</td>
                                                    <td>{{ $riwayat->keterangan }}</td>
                                                    <td class="text-right">
                                                        <div class="button-container">
                                                            <button type="button" class="custom-button" data-toggle="modal"
                                                                data-target="#lampiranModal">
                                                                Lihat
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer footer-black  footer-white ">
                    <div class="container-fluid">
                        <div class="row">
                            <nav class="footer-nav">
                                <ul>
                                    <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                                    <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                                    <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                                </ul>
                            </nav>
                            <div class="credits ml-auto">
                                <span class="copyright">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                                </span>
                            </div>
                        </div>
                    </div>
                </footer>
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
                            text: 'Pastikan semua kolom terisi',
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
                                confirmButtonText: 'OK',
                            }).then(() => {
                                // Update nilai sisa limit di frontend
                                $('#sisaLimit').text(response.sisa_limit.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                                // Update progress bar
                                $('#progressBar').css('width', persentase + '%');
                                $('#progressBar').attr('aria-valuenow', persentase);
                                $('#progressBar').text(kasbonAktif.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                                // Update tabel
                                var newRow = `
                                    <tr>
                                        <td>${response.no}</td>
                                        <td>${response.tanggal_pengajuan}</td>
                                        <td>${response.alasan}</td>
                                        <td>${response.nominal_diajukan}</td>
                                        <td>${response.keterangan}</td>
                                        <td class="text-right">
                                            <div class="button-container">
                                                <button type="button" class="custom-button" data-toggle="modal" data-target="#lampiranModal">
                                                    Lihat
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                                $('#kasbonTableBody').prepend(newRow);
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
                            const kasbonAktif = response.kasbon_aktif; // Kasbon aktif dari backend
                            const sisaLimit = response.sisa_limit; // Sisa limit dari backend

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
                            alert('Gagal mengambil data sisa limit.');
                        },
                    });
                }

                // Panggil fungsi saat halaman dimuat
                updateSisaLimit();
            });

            $(document).ready(function () {
                $('#kirimPembayaranBtn').on('click', function () {
                    // Ambil data dari form menggunakan FormData
                    var formData = new FormData($('#kasbonPaymentForm')[0]);

                    // Pastikan tanggal, nominal, dan lampiran diambil dengan benar
                    var tanggal = $('#tanggal').val();
                    var nominal = $('#nominal').val();
                    var lampiran = $('#lampiran')[0].files[0]; // Ambil file pertama dari input file

                    // Validasi data
                    if (!tanggal || !nominal || !lampiran) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: response.responseJSON ? response.responseJSON.message : 'Pastikan semua kolom terisi dan lampiran diupload.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        });
                        return;
                    }

                    // Tambahkan data ke FormData
                    formData.append('tanggal_pembayaran', tanggal);
                    formData.append('nominal_pembayaran', nominal);

                    // Kirim data menggunakan AJAX
                    $.ajax({
                        url: '{{ route('kasbon.payment') }}', // Ganti dengan route yang sesuai
                        method: 'POST',
                        data: formData,
                        processData: false,  // Jangan memproses data form menjadi query string
                        contentType: false,  // Jangan set content-type karena FormData yang akan melakukannya
                        success: function (response) {
                            Swal.fire({
                                title: 'Pembayaran Berhasil!',
                                text: response.success,
                                icon: 'success',
                                confirmButtonText: 'OK',
                            }).then(function () {
                                // Lakukan pembaruan tampilan atau reset form jika perlu
                                $('#kasbonPaymentForm')[0].reset(); // Reset form setelah sukses
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: response.responseJSON ? response.responseJSON.message : 'Terjadi kesalahan.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                            });
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>