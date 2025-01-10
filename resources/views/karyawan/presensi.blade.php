@extends('layouts.sidebarkaryawan')

@section('content')
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
                      @if ($user && $user->karyawan && $user->karyawan->toko)
                          <span>{{ $user->karyawan->toko->name }}</span>
                      @else
                          <span>-</span>
                      @endif
                      <!-- <span>Tanah Abang</span> -->
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
                    <hr>
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

@endsection