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
</head>
<body class="">
    <div class="wrapper m-auto">
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

        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Daftar Pengajuan</h5>
                </div>

                <div class="top-0 start-0">
                    <div>
                        <div>
                            <!-- Main Content -->
                            <div class="col">
                                <div class="input-group search-bar">
                                    <input type="text" class="form-control search-bar" id="searchBar" placeholder="Cari Karyawan..">
                                    <span class="input-group-text ">
                                      <i class="bi bi-search"></i>
                                    </span>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
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
                                                    <tr>
                                                        <td>NIP</td>
                                                        <td>Nama</td>
                                                        <td>Tanggal Pengajuan</td>
                                                        <td>Jumlah</td>
                                                        <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#kasbonModal">
                                                                <i class="bi bi-eye"></i> Lihat
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="gaji-row" id="tableBody">
                                                    <tr>
                                                        <td>NIP</td>
                                                        <td>Nama</td>
                                                        <td>Tanggal Pengajuan</td>
                                                        <td>Jumlah</td>
                                                        <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#kasbonModal">
                                                            <i class="bi bi-eye"></i> Lihat
                                                        </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="gaji-row" id="tableBody">
                                                    <tr>
                                                        <td>NIP</td>
                                                        <td>Nama</td>
                                                        <td>Tanggal Pengajuan</td>
                                                        <td>Jumlah</td>
                                                        <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#kasbonModal">
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
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="kasbonModal" tabindex="-1" aria-labelledby="kasbonModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>    
                        </div>
                        <h5 class="modal-title" id="kasbonModalLabel">Pengajuan Kasbon</h5>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-5 label-bold">NIP :</div>
                                <div class="col-7 bg-gray">212</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Nama :</div>
                                <div class="col-7 bg-gray">Nama</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Tanggal :</div>
                                <div class="col-7 bg-gray">02/07/2024</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Alasan Pengajuan :</div>
                                <div class="col-7">Beli Obat</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Limit Kasbon :</div>
                                <div class="col-7 bg-gray">Rp. 1.500.000</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Pengajuan :</div>
                                <div class="col-7">Rp. 1.500.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            {{-- <footer class="footer footer-black  footer-white ">
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
            </footer> --}}
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
            const button = event.relatedTarget;
            document.getElementById('modalNip').textContent = button.getAttribute('data-nip');
            document.getElementById('modalNama').textContent = button.getAttribute('data-nama');
            document.getElementById('modalTanggal').textContent = button.getAttribute('data-tanggal');
            document.getElementById('modalAlasan').textContent = button.getAttribute('data-alasan');
            document.getElementById('modalLimit').textContent = button.getAttribute('data-limit');
            document.getElementById('modalPengajuan').textContent = button.getAttribute('data-pengajuan');
        });
    </script>
</body>
</html>