<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Beranda | JAVA COLLECTION
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min-employee.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- CSS for Hamburger Menu -->
  <style>
    /* Sidebar */
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
      height: 100%;
      background-color: #fff;
      transition: left 0.3s ease;
      z-index: 1000;
    }

    /* When sidebar is active, slide it in */
    .sidebar.active {
      left: 0;
    }

    /* Hide sidebar off-screen by default on small screens */
    @media (max-width: 768px) {
      .sidebar {
        left: -250px;
      }

      /* Hamburger Menu */
      .hamburger-menu {
        display: block;
        font-size: 30px;
        cursor: pointer;
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 2000;
      }

      /* Ensure the sidebar hides again if it's not active */
      .sidebar.active {
        left: 0;
      }
    }

    /* Ensure hamburger is hidden on larger screens */
    @media (min-width: 768px) {
      .hamburger-menu {
        display: none;
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <span class="simple-text font-weight-bold">
          JAVA COLLECTION
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
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
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#pengajuanDropdown">
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
                <li>
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

    <div class="main-panel">
      <!-- Hamburger Button -->
      <div class="hamburger-menu" onclick="toggleSidebar()">&#9776;</div>

      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Core JS Files -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
  <!-- Notifications Plugin -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script type="module" src="../assets/js/dashboard-manajer.js"></script>

  <script>
    // Function to toggle the sidebar visibility
    function toggleSidebar() {
      var sidebar = document.querySelector('.sidebar');
      sidebar.classList.toggle('active');
    }
  </script>
</body>

</html>
