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
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/perizinan-modal.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
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
                                    <a href="{{route('karyawan.perizinan')}}" ">
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
                        <a href="./notifications.html">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Gaji</p>
                        </a>
                    </li>
                    <li>
                        <a href="./user.html">
                            <i class="nc-icon nc-single-02"></i>
                            <p>User Profile</p>
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



        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Riwayat</h5>
                </div>
            
                <div class="row align-items-start">
                    <!-- Kolom Tombol -->
                    <div class="col-lg-4 col-md-6 mb-3">
                        <button class="btn w-40 mb-2"
                            style="background-color: #FFD7A9; border-radius: 18px; font-size: 0.9rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-simple-add mr-2"></i> Ajukan Kasbon
                        </button>
                        <button class="btn w-45"
                            style="background-color: #FFBA6B; border-radius: 18px; font-size: 0.9rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-money-coins mr-2"></i> Bayar
                        </button>
                    </div>
            
                    <!-- Kolom Card Sisa Limit -->
                    <div class="d-flex justify-content-end col-lg-8 col-md-6 ">
                        <div class="card shadow-sm w-100" style="border-radius: 12px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="font-weight-bold">Sisa limit: </span>
                                    <span class="font-weight-bold text-dark"> 2.100.000</span>
                                </div>
                                <!-- Progress Bar -->
                                <div class="progress" style="height: 24px; border-radius: 12px;">
                                    <div class="progress-bar bg-danger text-white font-weight-bold" role="progressbar"
                                        style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        900.000
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
                                                Keterangan
                                            </th>
                                            <th>
                                                Nominal
                                            </th>
                                            <th>
                                                Alasan
                                            </th>
                                            <th class="text-right">
                                                Lampiran
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    12 Desember 2024
                                                </td>
                                                <td>
                                                    Sakit
                                                </td>
                                                <td>
                                                    Pending
                                                </td>
                                                <td class="text-center">
                                                    -
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Lihat
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
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
                demo.initChartsPages();
            });
        </script>


</body>

</html>