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
    Beranda | JAVA COLLECTION
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min-employee.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="mb-4">
          <small class="text-muted d-block">Beranda</small>
          <h5 class="font-weight-bold">Selamat datang!</h5>
        </div>
        <div class="d-flex justify-content-start align-items-center gap-4 mb-4">
          <div class="d-flex align-items-center mr-2">
            <i class="nc-icon nc-circle-10 text-primary mr-2"></i>          
            <div>
              <span  style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">Putu Dian Shinta Prativi</span>
              <small class="text-muted d-block">222212822</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center mr-2">
            <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
            <div>
              <span id="current-day">Sabtu</span>
              <small id="current-date" class="text-muted d-block">26 Oktober 2024</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center ml-1">
            <i class="nc-icon nc-pin-3 text-primary mr-1"></i>
            <div>
              <span style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">Tanah Abang</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-12 d-flex justify-content-start align-items-center">
                    <span id="time-display" class="mr-3 font-weight-bold" style="font-size:1.5rem;">00.00</span>
                    <form action="{{ route('presensi.store') }}" method="POST" id="form-presensi">
                      @csrf <!-- Token keamanan Laravel -->
                    
                      <input type="hidden" name="status" value="Hadir">
                      <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                      <input type="hidden" name="waktu" value="{{ date('H:i:s') }}">
                      <input type="hidden" name="toko" value="Toko A"> <!-- Isi sesuai kebutuhan -->
                      <input type="hidden" name="nip" value="123456"> <!-- Isi sesuai kebutuhan -->
                      <input type="hidden" name="redirect_to" value="karyawan.beranda">

                      <button id="btn-presensi" type="submit" class="btn btn-success" style="font-size: 1rem; color: black; padding: 0.65em">
                        Presensi
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
              </div>
            </div>
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
                <p class="card-category">Bulanan</p>
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
                © <script>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>

  <script src="../assets/js/plugins/presensi.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>Paper Dashboard DEMO methods, don't include it in your project! -->
  <script type="module" src="../assets/js/dashboard-manajer.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

<script>
    const targetCoords = { latitude: -6.227873621256837, longitude: 106.86683247073589 }; // Lokasi tujuan
    const radiusAllowed = 100; // Radius dalam meter

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

    // Tambahkan event listener ke form presensi
    document.getElementById('form-presensi').addEventListener('submit', function (event) {
      event.preventDefault(); // Mencegah pengiriman form default

      // Panggil fungsi validateLocation sebelum mengirim data
      validateLocation((isValid, message) => {
        if (isValid) {
          // Kirim data presensi via AJAX jika lokasi valid
          $.ajax({
            url: "{{ route('presensi.store') }}",
            method: "POST",
            data: {
              _token: "{{ csrf_token() }}",
              status: "Hadir", // Status yang dipilih
              tanggal: new Date().toISOString().split('T')[0], // Format YYYY-MM-DD
              waktu: new Date().toLocaleTimeString('id-ID', { timeZone: 'Asia/Jakarta', hour12: false }), // Format HH:MM:SS
              toko: "Toko A", // Ganti dengan toko yang sesuai
              nip: "123456" // NIP yang sesuai
            },
            success: function (response) {
              // Menampilkan SweetAlert
              Swal.fire({
                icon: 'success',
                title: 'Presensi Berhasil!',
                text: response.message || 'Data presensi telah berhasil disimpan.',
                showConfirmButton: false,
                timer: 1500
              });

              // Menambahkan data presensi ke tabel dengan increment No
              const rowCount = $('#riwayat-presensi tbody tr').length + 1;
              $('#riwayat-presensi tbody').append(`
                          <tr>
                              <td>${rowCount}</td>
                              <td>${response.tanggal || new Date().toISOString().split('T')[0]}</td>
                              <td>${response.waktu || new Date().toLocaleTimeString('id-ID', { timeZone: 'Asia/Jakarta', hour12: false })}</td>
                          </tr>
                      `);

              // Nonaktifkan tombol setelah ditekan dan ubah teks tombol menjadi "Hadir"
              $('#btn-presensi').prop('disabled', true).text('Hadir');
            },
            error: function (xhr, status, error) {
              // Menampilkan pesan kesalahan dengan informasi dari server (jika ada)
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
          // Tampilkan pesan kesalahan jika lokasi tidak valid
          Swal.fire({
            icon: 'error',
            title: 'Lokasi Tidak Valid',
            text: message,
            showConfirmButton: true
          });
        }
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
      
      // Update elemen dengan ID
      document.getElementById('current-day').textContent = dayOfWeek;
      document.getElementById('current-date').textContent = formattedDate;
    }

    // Update waktu dan tanggal setiap detik
    setInterval(updateDateTime, 1000);

    // Panggil fungsi pertama kali saat halaman dimuat
    updateDateTime();
  </script>
</body>

</html>
