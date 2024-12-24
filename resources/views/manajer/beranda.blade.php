<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   JAVA COLLECTION | Beranda
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
          <li class="active ">
            <a href="{{route('manager.beranda')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="{{route('manajer.gaji')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Gaji</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="nc-icon nc-single-02"></i>
              <p>Karyawan</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="mb-4">
          <small class="text-muted d-block">Beranda</small>
          <h5 class="font-weight-bold">Selamat datang!</h5>
        </div>
        <div class="d-flex justify-content-start align-items-center gap-4 mb-4">
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-circle-10 text-primary mr-2"></i>          
            <div>
              <span>Putu Dian Shinta Prativi</span>
              <small class="text-muted d-block">222212822</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
            <div>
              <span>Sabtu</span>
              <small class="text-muted d-block">26 Oktober 2024</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center me-4">
            <i class="nc-icon nc-pin-3 text-primary mr-2"></i>
            <div>
              <span>Cab. Tanah Abang</span>
            </div>
          </div>
        </div>

        <!-- Cabang -->
        <div class="cabang">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body ">
                    <div class="selected-menu">
                      <div class="selected-btn">
                        <span class="sBtn-text">Cabang A</span>
                        <i class="bx bx-chevron-down"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    
          <div class="overlay" id="overlay-cabang">
            <ul class="options">
                <li class="option" id="option-first">
                    <span class="option-text">Cabang A</span>
                </li>
                <li class="option">
                    <span class="option-text">Cabang B</span>
                </li>
                <li class="option">
                    <span class="option-text">Cabang C</span>
                </li>
                <li class="option" id="option-last">
                    <span class="option-text">Cabang D</span>
                </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">
                  Kehadiran<br>
                  Karyawan
                </h5>
                <p class="card-category">Mingguan</p>
              </div>
              <div class="card-body">
                <canvas id="barChart"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(139, 69, 19, 0.8);"></i>Izin
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 0, 0, 0.8);"></i>Tanpa Keterangan
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">
                  Kehadiran<br>
                  Karyawan
                </h5>
                <p class="card-category">Desember</p>
              </div>
              <div class="card-body ">
                <canvas id="doughnutChart"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(139, 69, 19, 0.8);"></i>Izin
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 0, 0, 0.8);"></i>Tanpa Keterangan
                  </div>
                </div>
              </div>
            </div>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
  <script src="../assets/demo/demo-manajer.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/js/dashboard.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
