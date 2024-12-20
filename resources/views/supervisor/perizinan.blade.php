<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Java Collection | {{ $title }}
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    </div>

    <!-- Content -->
    <div class="main-panel">
        <div class="content">
            <div class="mb-4">
                <small class="text-muted d-block">Perizinan</small>
                <h5 class="font-weight-bold">Daftar Perizinan</h5>
            </div>

            <div class="top-0 start-0">
                <div>
                    <!-- Main Content -->
                    <div class="col">
                        
                        <div class="input-group search-bar">
                            <input type="text" class="form-control search-bar" id="searchBar" placeholder="Cari Karyawan..">
                            <span class="input-group-text ">
                              <i class="bi bi-search"></i>
                            </span>
                        </div>
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Lampiran</th>
                                            </tr>
                                        </thead>
                                        <tbody class="gaji-row" id="tableBody">
                                            <tr>
                                                <td>001</td>
                                                <td>Rafliansyah Dwi S...</td>
                                                <td>02/07/2024</td>
                                                <td><span class="badge bg-warning">Diproses</span></td>
                                                <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#perizinanModal">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody class="gaji-row" id="tableBody">
                                            <tr>
                                                <td>321</td>
                                                <td>Kurodia</td>
                                                <td>02/07/2024</td>
                                                <td><span class="badge bg-success">Diterima</span></td>
                                                <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#perizinanModal">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody class="gaji-row" id="tableBody">
                                            <tr>
                                                <td>320</td>
                                                <td>Amalia</td>
                                                <td>02/07/2024</td>
                                                <td><span class="badge bg-danger">Ditolak</span></td>
                                                <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#perizinanModal">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </a>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="container-fluid">
                    
                </div> --}}
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
                        <div class="row mb-2">
                            <div class="col-5 label-bold">NIP:</div>
                            <div class="col-7 bg-gray">212</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Nama:</div>
                            <div class="col-7 bg-gray">Laurent</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Tanggal:</div>
                            <div class="col-7 bg-gray">02/07/2024</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Jenis:</div>
                            <div class="col-2">
                                <div class="container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisSakit" value="sakit" checked>
                                        <label class="form-check-label text-black" for="jenisSakit">Sakit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisCuti" value="cuti">
                                        <label class="form-check-label text-black" for="jenisCuti">Cuti</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisLain" value="lain-lain">
                                        <label class="form-check-label text-black" for="jenisLain">Lain lain</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Keterangan:</div>
                            <div class="col-7">
                                <textarea id="keterangan" class="form-control" rows="4" disabled>Izin sakit flu dan demam</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 label-bold">Bukti:</div>
                            <a id="bukti_pembayaran" href="#" target="_blank" class="btn btn-sm btn-light ml-3">
                                Unduh </a>
                        </div>
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
                    <p>Apakah Anda yakin ingin menerima perizinan ini?</p>
                    <div class="text-center">
                        <button type="button" class="btn btn-success" id="btnYakin">Yakin</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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
            </div>
            </div>
        </footer>
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
        // Event untuk tombol "Terima Pembayaran"
        document.getElementById('btnTerima').addEventListener('click', function() {
            // Tampilkan modal konfirmasi
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();
        });

        // Event untuk tombol "Yakin"
        document.getElementById('btnYakin').addEventListener('click', function () {
            // Logika untuk aksi "Yakin" (misalnya, submit data)
            alert('Perizinan berhasil diterima!');
            // Tutup modal
            const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
            confirmModal.hide();
        });

        // Event untuk tombol "Tolak Pembayaran"
        document.getElementById('btnTolak').addEventListener('click', function() {
            console.log('Perizinan dibatalkan.');
        });
    </script>
</body>

</html>
