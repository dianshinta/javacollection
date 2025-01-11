<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Presensi | JAVA COLLECTION
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  <div class="wrapper">
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
          <li class="active">
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <!-- <div class="sidebar" data-color="white" data-active-color="danger">
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
          <li class="active">
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
            <a href="{{route('karyawan.gaji')}}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Gaji</p>
            </a>
          </li>
        </ul>
      </div>
    </div> -->
    <div class="main-panel">
      <div class="content">
        <div class="mb-4">
          <small class="text-muted d-block">Presensi</small>
          <h5 class="font-weight-bold">Presensi dulu, yuk!</h5>
        </div>
        
        <div class="d-flex justify-content-start gap-4 mb-1">
            <div class="d-flex flex-column justify-content-start gap-4 mb-4">
                <div class="d-flex align-items-center mr-5 mb-4">
                    <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
                    <div>
                      <span id="current-day"></span>
                      <small id="current-date" class="text-muted d-block"></small>
                    </div>
                  </div>
                  
                  <div class="d-flex align-items-center me-4">
                    <i class="nc-icon nc-pin-3 text-primary mr-2"></i>
                    <div>
                      <span>Tanah Abang</span>
                    </div>
                </div>
            </div>          
            <div class="col-lg-3 col-md-6 col-sm-6 ml-3">
                <div class="card card-stats" style="width:80%; height:80%;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 d-flex flex-column justify-content-start align-items-center">
                        <span id="time-display" class="mr-2 font-weight-bold" style="font-size:1.5rem;">07.10</span>
                          <form action="{{ route('presensi.store') }}" method="POST" id="form-presensi">
                            @csrf <!-- Token keamanan Laravel -->

                            <!-- <input type="hidden" name="status" value="">
                            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="waktu" value="{{ date('H:i:s') }}">
                            <input type="hidden" name="toko" value="Toko A"> Isi sesuai kebutuhan -->
                            <!-- <input type="hidden" name="nip" value="5943"> Isi sesuai kebutuhan -->
                            <!-- <input type="hidden" name="redirect_to" value="karyawan.presensi"> -->
                            <button id="btn-presensi" type="submit" class="btn btn-success" style="font-size: 1rem; color: black; padding: 0.6em; width: 100%; overflow: hidden, text-overflow: ellipsis;" {{ $hasPresensiToday ? 'disabled' : ''}}>
                                Presensi
                            </button>
                          </form>
                      </div>
            
                    </div>
                  </div>
                  <div class="card-footer ">
                  </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <p class="font-weight-bold" style="margin-left: 1rem; margin-bottom: 0.5rem; font-size: 1.2rem;">Riwayat</p>
          <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="riwayat-presensi">
                        <thead class=" text-primary text-center">
                          <th>
                            No
                          </th>
                          <th>
                            Tanggal
                          </th>
                          <th>
                            Waktu
                          </th>
                          <th>
                            Status
                          </th>
                        </thead>
                        <tbody class="text-center">
                          @if ($riwayatPresensi->isEmpty())
                            <tr>
                                <td colspan="6">Tidak ada data presensi</td>
                            </tr>
                          @else
                            @foreach ($riwayatPresensi as $riwayat)
                            <tr>
                              <td>{{ $loop->iteration }}</td>  <!-- Corrected: use $loop->iteration for auto-increment -->
                              <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->translatedFormat('j F Y') }}</td>
                              <td>{{ $riwayat->waktu }}</td>
                              <td><span class="status">{{ $riwayat->status }}</span></td>
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
    <footer class="footer footer-black  footer-white">
      <div class="container-fluid">
        <div class="row">
          <div class="credits ml-auto">
            <span class="copyright">
              © <script>
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

  <script src="../assets/js/plugins/presensi.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
    const targetCoords = { latitude: -6.225796, longitude: 106.876853 }; // Lokasi tujuan
    const radiusAllowed = 2000; // Radius dalam meter

    // Fungsi untuk menghitung jarak dengan formula Haversine
    function calculateDistance(lat1, lon1, lat2, lon2) {
      const toRad = (value) => (value * Math.PI) / 180;
      const R = 6371e3; // Radius Bumi dalam meter

      const φ1 = toRad(lat1);
      const φ2 = toRad(lat2);
      const Δφ = toRad(lat2 - lat1);
      const Δλ = toRad(lon2 - lon1);

      const a =
        Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
        Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

      return R * c; // Jarak dalam meter
    }

    // Fungsi untuk memeriksa lokasi sebelum presensi
    function validateLocation(callback) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const userCoords = {
              latitude: position.coords.latitude,
              longitude: position.coords.longitude,
            };

            const distance = calculateDistance(
              userCoords.latitude,
              userCoords.longitude,
              targetCoords.latitude,
              targetCoords.longitude
            );

            if (distance <= radiusAllowed) {
              callback(true); // Lokasi valid
            } else {
              callback(false, `Koordinatmu: ${userCoords.latitude}, ${userCoords.longitude}. Anda terlalu jauh (${Math.round(distance)} meter) dari lokasi tujuan.`);
            }
          },
          (error) => {
            callback(false, 'Tidak dapat mendapatkan lokasi Anda. Pastikan GPS aktif.');
            console.error(error);
          }
        );
      } else {
        callback(false, 'Geolocation tidak didukung di browser Anda.');
      }
    }

    $(document).ready(function() {
      const today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD

      // Logika presensi (terlambat atau hadir)
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();

      // Batas waktu yaitu jam 9:00
      const batasJam = 9;
      const batasMenit = 0;

      let statusPresensi = (hours > batasJam || (hours === batasJam && minutes > batasMenit)) ? 'Terlambat' : 'Hadir';

      // if ((hours < 8 || (hours === 8 && minutes < 30)) || (hours > 17 || (hours === 17 && minutes > 30))) {
      //   $('#btn-presensi').prop('disabled', true);
      // }

      // Menambahkan statusPresensi ke data presensi saat submit
      $('#form-presensi').on('submit', function(event) {
          event.preventDefault(); // Mencegah pengiriman form default

          validateLocation((isValid, message) => {
              if (isValid) {
                  $.ajax({
                      url: "{{ route('presensi.store') }}",
                      method: "POST",
                      data: {
                          _token: "{{ csrf_token() }}",
                          status: statusPresensi, // Status yang dipilih
                          tanggal: today, // Format YYYY-MM-DD
                          waktu: new Date().toLocaleTimeString('id-ID', { timeZone: 'Asia/Jakarta', hour12: false }).slice(0, 5), // Format HH:MM
                          toko_id: 1, // Ganti dengan toko yang sesuai
                          // nip: "222212822" // NIP yang sesuai
                      },
                      success: function (response) {
                        sessionStorage.setItem('presensiStatus', 'success');
                        sessionStorage.setItem('presensiMessage', response.message || 'Data presensi telah berhasil disimpan.');
                        sessionStorage.setItem('presensiDisabled', 'true'); // Simpan status tombol
                        sessionStorage.setItem('presensiDate', today); // Simpan waktu presensi

                        Swal.fire({
                            icon: 'success',
                            title: 'Presensi Berhasil!',
                            text: sessionStorage.getItem('presensiMessage'),
                            showConfirmButton: false,
                            timer: 1500,
                            willClose: () => location.reload()
                        });
                      },
                      error: function (xhr, status, error) {
                          const errorMessage = xhr.responseJSON?.message || 'Terjadi kesalahan. Silakan coba lagi.';
                          Swal.fire({
                              icon: 'error',
                              title: 'Gagal melakukan presensi!',
                              text: errorMessage,
                              showConfirmButton: true
                          });
                      }
                  });
              } else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Lokasi Tidak Valid',
                      text: message,
                      showConfirmButton: true
                  });
              }
          });
      });
  });

  function updateDateTime() {
      var now = new Date();
      var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      
      var dayOfWeek = days[now.getDay()];
      var dayOfMonth = now.getDate();
      var month = months[now.getMonth()];
      var year = now.getFullYear();

      var formattedDate = `${dayOfMonth} ${month} ${year}`;
      
      document.getElementById('current-day').textContent = dayOfWeek;
      document.getElementById('current-date').textContent = formattedDate;
  }

  setInterval(updateDateTime, 1000);
  updateDateTime();

  </script>
</body>

</html>

<!-- presensi.blade.php ->