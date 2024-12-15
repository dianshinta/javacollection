<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Kasbon Karyawan
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/kasbon-supervisor.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="top-0 start-0">
        <div class="container-fluid">
            <div>
                <!-- Main Content -->
                <div class="col">
                    <div class="p-4">
                        <h5>Kasbon</h5>
                        <input type="text" class="form-control search-bar" id="searchBar" placeholder="Search">
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
                                    <td><a href="#" class="btn btn-lihat" data-bs-toggle="modal" data-bs-target="#kasbonModal">
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
                                    <td><a href="#" class="btn btn-lihat" data-bs-toggle="modal" data-bs-target="#kasbonModal">
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