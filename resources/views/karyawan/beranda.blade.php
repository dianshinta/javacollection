@extends('layouts.sidebarkaryawan')

@section('content')

@php
// Mendapatkan nip dari user yang sedang login
$nip = Auth::user()->nip;
// Mendapatkan tanggal hari ini
$today = \Carbon\Carbon::now()->toDateString();
// Mengecek apakah sudah ada presensi hari ini
$hasPresensiToday = \App\Models\Presensi::where('nip', $nip)
  ->whereDate('tanggal', $today)
  ->exists();
// Mengambil data user yang sedang login dan relasi karyawan dan toko
$user = auth()->user(); // Mengambil user yang sedang login
$user = $user->load('karyawan.toko'); // Mengambil relasi karyawan dan toko
@endphp

<div class="mb-4">
  <small class="text-muted d-block">Beranda</small>
  <h5 class="font-weight-bold">Selamat datang!</h5>
</div>
<div class="d-flex justify-content-start align-items-center gap-4 mb-4">
  <div class="d-flex align-items-center mr-2">
    <i class="nc-icon nc-circle-10 text-primary mr-2"></i>
    <div>
      <span
        style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ Auth::user()->name }}</span>
      <small class="text-muted d-block">{{ Auth::user()->nip }}</small>
    </div>
  </div>

  <div class="d-flex align-items-center mr-2">
    <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
    <div>
      <span>{{ \Carbon\Carbon::now()->translatedFormat('l') }}</span> <!-- Nama Hari -->
      <small class="text-muted d-block">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small> <!-- Tanggal -->
    </div>
  </div>

  <div class="d-flex align-items-center ml-1">
    <i class="nc-icon nc-pin-3 text-primary mr-1"></i>
    <div>
      @if ($user && $user->karyawan && $user->karyawan->toko)
      <span
      style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $user->karyawan->toko->name }}</span>
    @else
      <span>-</span>
    @endif
      <!-- <span >Tanah Abang</span> -->
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats mb-4">
      <div class="card-body ">
        <div class="row">
          <div class="col-12 d-flex justify-content-start align-items-center">
            <span id="time-display" class="mr-2 font-weight-bold" style="font-size:1.5rem;">00.00</span>
            <form action="{{ route('presensi.store') }}" method="POST" id="form-presensi">
              @csrf <!-- Token keamanan Laravel -->
              <button id="btn-presensi" type="submit" class="btn btn-success"
                style="font-size: 1rem; color: black; padding: 0.5em;" @if($hasPresensiToday) disabled @endif>
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

      // // Cek apakah tombol harus dinonaktifkan (sudah klik presensi di menit ini)
      // const presensiDisabled = sessionStorage.getItem('presensiDisabled') === 'true';
      // const presensiDate = sessionStorage.getItem('presensiDate');

      // if (presensiDisabled && presensiDate === today) {
      //     $('#btn-presensi').prop('disabled', true);
      // }

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
                          status: statusPresensi, 
                          tanggal: today,
                          waktu: new Date().toLocaleTimeString('id-ID', { timeZone: 'Asia/Jakarta', hour12: false }).slice(0, 5), // Format HH:MM
                          toko_id: 1, // Ganti dengan toko yang sesuai
                          nip: "5943" // NIP yang sesuai
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
@endsection