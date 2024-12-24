<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Java Collection | {{ $title }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/css/supervisor-perizinan.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Alert -->
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
            <!-- Menu -->
            @include('supervisor.menu')
            <!-- END MENU -->
        </div>

        <!-- Content -->
        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Perizinan</small>
                    <h5 class="font-weight-bold">Daftar Perizinan</h5>
                </div>
                <div class="top-0 start-0">
                    <div>
                        <!-- Main Content -->
                        <div class="col">
                            <!-- Pencarian -->
                            <form method="GET" action="{{ route('supervisor.perizinan') }}" class="d-flex">
                                <div class="input-group search-bar">
                                    <input type="text" class="form-control search-bar" name="search" id="searchBar" placeholder="Cari Karyawan.." value="{{ $search ?? '' }}" >
                                    <span class="input-group-text">
                                        <button type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            
                            <!-- Tabel Perizinan -->
                            <div class="card ">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Lampiran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($perizinan as $data)
                                                    <tr>
                                                        <td>{{ $data->nip }}</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td>{{ $data->tanggal->format('d/m/Y') }}</td>
                                                        <td>
                                                            @if ($data->status === 'Diproses')
                                                                <span class="badge bg-warning">Diproses</span>
                                                            @elseif ($data->status === 'Disetujui')
                                                                <span class="badge bg-success">Disetujui</span>
                                                            @else
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" 
                                                            class="btn btn-info btn-round" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#perizinanModal"
                                                            data-nip="{{ $data->nip }}"
                                                            data-nama="{{ $data->nama }}"
                                                            data-tanggal="{{ $data->tanggal->format('d/m/Y') }}"
                                                            data-jenis="{{ $data->jenis }}"
                                                            data-keterangan="{{ $data->keterangan }}"
                                                            data-lampiran="{{ $data->lampiran }}">
                                                                <i class="bi bi-eye"></i> Lihat
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

                <!-- Modal -->
                <div class="modal fade" id="perizinanModal" tabindex="-1" aria-labelledby="perizinanModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>    
                        </div>
                        <h5 class="modal-title" id="perizinanModalLabel">Formulir Perizinan</h5>
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-5 label-bold">NIP:</div>
                                <div class="col-7 bg-gray" id="modal-nip"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Nama:</div>
                                <div class="col-7 bg-gray" id="modal-nama"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Tanggal:</div>
                                <div class="col-7 bg-gray" id="modal-tanggal"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Jenis:</div>
                                <div class="col-7 bg-gray" id="modal-jenis"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Keterangan:</div>
                                <div class="col-7">
                                    <textarea class="form-control" rows="4" id="modal-keterangan" disabled>Izin sakit flu dan demam</textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Lampiran:</div>
                                <a href="#" target="_blank" class="btn btn-sm btn-secondary ml-3" id="modal-lampiran">
                                    Preview </a>
                            </div>
                            <div class="container mt-5 text-center">
                                <div class="btn-group-custom justify-content-center">
                                <!-- Tombol Terima -->
                                <button class="btn btn-rounded btn-accept" id="btnTerima">
                                    Terima Perizinan </button>
                                <!-- Tombol Tolak -->
                                <button class="btn btn-rounded btn-reject" id="btnTolak">
                                    Tolak Perizinan </button>
                                </div>
                            </div>                  
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="confirmMessage"></p> <!--Text confirm-->
                                <div class="text-center">
                                    <button type="button" class="btn btn-success" id="btnYakin">Yakin</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnBatal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
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
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
        });
    </script>

  <!-- JavaScript -->
    <script>
        // Event untuk menampilkan data di modal
        document.addEventListener('DOMContentLoaded', function(){
            const perizinanModal = document.getElementById('perizinanModal');

            perizinanModal.addEventListener('show.bs.modal', function(event){
                // Tombol yang memicu modal
                const button = event.relatedTarget;

                // Ambil data dari tombol
                const nip = button.getAttribute('data-nip');
                const nama = button.getAttribute('data-nama');
                const tanggal = button.getAttribute('data-tanggal');
                const jenis = button.getAttribute('data-jenis');
                const keterangan = button.getAttribute('data-keterangan');
                const lampiran = button.getAttribute('data-lampiran');

                // Isi elemen modal dengan data
                document.getElementById('modal-nip').textContent = nip;
                document.getElementById('modal-nama').textContent = nama;
                document.getElementById('modal-tanggal').textContent = tanggal;
                document.getElementById('modal-jenis').textContent = jenis;
                document.getElementById('modal-keterangan').value = keterangan;

                // Update link di modal
                const modalLampiran = document.getElementById('modal-lampiran');
                if (lampiran) {
                    modalLampiran.href = `/storage/${lampiran}`; // Path file untuk unduhan
                    modalLampiran.style.display = 'inline'; // Tampilkan tombol
                } else {
                    modalLampiran.style.display = 'none'; // Sembunyikan tombol jika lampiran kosong
                }
            });
        });

        // Event melakukan updatestatus
        document.addEventListener('DOMContentLoaded', function () {
            const btnTerima = document.getElementById('btnTerima');
            const btnTolak = document.getElementById('btnTolak');
            const btnYakin = document.getElementById('btnYakin');
            const modalNip = document.getElementById('modal-nip');
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            const confirmMessage = document.getElementById('confirmMessage'); // Elemen <p> di modal
            let selectedStatus = ''; // Menyimpan status yang dipilih (Disetujui/Ditolak)

            // Event untuk tombol "Terima Perizinan"
            btnTerima.addEventListener('click', function () {
                selectedStatus = 'Disetujui';
                confirmMessage.textContent = 'Apakah Anda yakin ingin menerima perizinan ini?'; // Ubah pesan
                confirmModal.show(); // Tampilkan modal konfirmasi
            });

            // Event untuk tombol "Tolak Perizinan"
            btnTolak.addEventListener('click', function () {
                selectedStatus = 'Ditolak';
                confirmMessage.textContent = 'Apakah Anda yakin ingin menolak perizinan ini?'; // Ubah pesan
                confirmModal.show(); // Tampilkan modal konfirmasi
            });

            // Event untuk tombol "Yakin" di modal konfirmasi
            btnYakin.addEventListener('click', function () {
                const nip = modalNip.textContent; // Ambil NIP dari modal
                updateStatus(nip, selectedStatus); // Kirim permintaan ke server
            });

            // fungsi 
            function updateStatus(nip, status) {
                fetch('/perizinan/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ nip: nip, status: status })
                })
                .then(response => {
                if (response.status === 403) {
                    // Jika status adalah 403, baca pesan error dari server
                    return response.json().then(data => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Memperbarui Status',
                            text: data.message,
                            confirmButtonText: 'OK'
                        });
                    });
                } else if (response.ok) {
                    return response.json().then(data => {
                        // Menampilkan pesan sukses dengan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message || 'Status berhasil diperbarui.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload(); // Reload halaman untuk memperbarui tabel
                        });
                    });
                } else {
                    throw new Error('Terjadi kesalahan saat memperbarui status');
                }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Terjadi kesalahan saat memperbarui status');
                    // Menampilkan pesan error dengan SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan saat memperbarui status.',
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    </script>
</body>

</html>


