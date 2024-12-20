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
        Perizinan | JAVA COLLECTION
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
    <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />


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
                                <li class=" active">
                                    <a href="{{route('karyawan.perizinan')}}" ">
                    <p>Perizinan</p>
                  </a>
                </li>
                <li>
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
    
        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Perizinan</small>
                    <h5 class="font-weight-bold">Riwayat Izinmu</h5>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <button class="btn" type="button" data-toggle="modal" data-target="#perizinanModal"
                            style="background-color: #FFBA6B; border-radius: 18px; font-size: 0.75rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-simple-add mr-2"></i>
                            Ajukan izin
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
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
                                                Status
                                            </th>
                                            <th class="text-right">
                                                Lampiran
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
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
                                                    <span class="badge bg-warning">Diproses</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    11 Desember 2024
                                                </td>
                                                <td>
                                                    Sakit
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    10 Desember 2024
                                                </td>
                                                <td>
                                                    Sakit
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Diterima</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Tambah
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


                <!-- Perizinan Modal -->
                <div class="modal fade" id="perizinanModal" tabindex="-1" aria-labelledby="perizinanModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>    
                        </div>
                        <h5 class="modal-title" id="perizinanModalLabel">Formulir Perizinan</h5>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Tanggal:</div>
                                <div class="col-7 bg-gray">
                                    <input type="text" id="tanggalIzin" name="tanggalIzin" class="form-control" placeholder="Masukkan tanggal izin">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Jenis:</div>
                                <div class="col-7">
                                    <div class="container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenisSakit" value="sakit">
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
                                    <textarea id="keteranganIzin" name="keteranganIzin" class="form-control p-2" placeholder="Masukkan keterangan izin"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Bukti:</div>
                                <div class="col-7">
                                    <div class="button-container">
                                        <button type="button" class="custom-button" data-toggle="modal" data-target="#buktiModal">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-5 text-center">
                                <div class="btn-group-custom justify-content-center">
                                    <button type="button" class="btn btn-save" data-toggle="modal" data-target="#confirmModal" id="savePerizinan">
                                        Simpan
                                    </button>
                                </div>
                            </div>                  
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Modal Box for Tambah Bukti -->
                <div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header" id="modalHeader">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title pb-3" id="bonusModalLabel">Tambah Lampiran Bukti</h5>
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


                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin mengajukan izin ini?</p>
                            <div class="text-center">
                                <button type="button" class="btn btn-success" id="btnYakin">Yakin</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnBatal">Batal</button>
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