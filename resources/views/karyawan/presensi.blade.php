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
          <small class="text-muted d-block">Presensi</small>
          <h5 class="font-weight-bold">Presensi dulu, yuk!</h5>
        </div>
        
        <div class="d-flex justify-content-start gap-4 mb-4">
            <div class="d-flex flex-column justify-content-start gap-4 mb-4">
                <div class="d-flex align-items-center mr-5 mb-4">
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
            <div class="col-lg-3 col-md-6 col-sm-6 ml-5">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-12 d-flex justify-content-start align-items-center">
                        <span id="time-display" class="mr-3 font-weight-bold" style="font-size:1.5rem;">07.10</span>
                          <form action="{{ route('presensi.store') }}" method="POST" id="form-presensi">
                            @csrf <!-- Token keamanan Laravel -->

                            <input type="hidden" name="status" value="Hadir">
                            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="waktu" value="{{ date('H:i:s') }}">
                            <input type="hidden" name="toko" value="Toko A"> <!-- Isi sesuai kebutuhan -->
                            <input type="hidden" name="nip" value="123456"> <!-- Isi sesuai kebutuhan -->
                            <input type="hidden" name="redirect_to" value="karyawan.presensi">
                            <button id="btn-presensi" type="submit" class="btn btn-success" style="font-size: 1rem; color: black; padding: 0.65em">
                                Presensi
                            </button>
                          </form>
                      </div>
            
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="fa fa-clock-o"></i>
                      In the last hour
                    </div>
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
                        <thead class=" text-primary">
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
                        <tbody>
                          @foreach ($riwayatPresensi as $riwayat)
                          <tr>
                            <td>{{ $loop->iteration }}</td>  <!-- Corrected: use $loop->iteration for auto-increment -->
                            <td>{{ $riwayat->tanggal }}</td>
                            <td>{{ $riwayat->waktu }}</td>
                            <td>{{ $riwayat->status }}</td>
                          </tr>
                          @endforeach
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

  <!-- @if (session(key: 'success')) -->
  <script>
    document.getElementById('form-presensi').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form submission

        // Kirim data presensi via AJAX
        $.ajax({
            url: "{{ route('presensi.store') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                status: "Hadir", // Status yang dipilih
                tanggal: new Date().toISOString().split('T')[0], // Format YYYY-MM-DD
                waktu: new Date().toLocaleTimeString(), // Format HH:MM:SS
                toko: "Toko A", // Ganti dengan toko yang sesuai
                nip: "123456" // NIP yang sesuai
            },
            success: function(response) {
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
                        <td>${response.waktu || new Date().toLocaleTimeString()}</td>
                    </tr>
                `);

                // Nonaktifkan tombol setelah ditekan dan ubah teks tombol menjadi "Hadir"
                $('#btn-presensi').prop('disabled', true).text('Hadir');
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan kesalahan dengan informasi dari server (jika ada)
                const errorMessage = xhr.responseJSON?.message || 'Mohon periksa jaringan Anda, hidupkan lokasi perangkat, atau coba lagi saat Anda berada dalam radius 100 meter dari toko.';
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal melakukan presensi!',
                    text: errorMessage,
                    showConfirmButton: true
                });
            }
        });
    });


  </script>
  <!-- @endif -->

</body>

</html>
