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
        Gaji | JAVA COLLECTION
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
                    <li class="dropdown">
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
                                <li>
                                    <a href="{{route('karyawan.kasbon')}}">
                                        <p>Kasbon</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{route('karyawan.gaji')}}">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Gaji</p>
                        </a>
                    </li>
                    <li>
                        <!-- <a href="./user.html">
                            <i class="nc-icon nc-single-02"></i>
                            <p>User Profile</p>
                        </a> -->
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Gaji</small>
                    <h5 class="font-weight-bold">Riwayat</h5>
                </div>
            
                <div class="row align-items-start">         
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
                                                Bulan
                                            </th>
                                            <th>
                                                Tahun
                                            </th>
                                            <th>
                                                Nominal
                                            </th>
                                            <th class="text-right">
                                                Slip Gaji
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Januari
                                                </td>
                                                <td>
                                                    2025
                                                </td>
                                                <td>
                                                    3000000
                                                </td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <button type="button" class="custom-button" data-toggle="modal"
                                                            data-target="#lampiranModal">
                                                            Unduh
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
                                    <li><a href="https://www.creative-tim.com" target="_blank">Kelompok 1 - RPL</a></li>
                                    <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                                    <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                                </ul>
                            </nav>
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