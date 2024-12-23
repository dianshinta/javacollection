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
  <link href="../assets/css/supervisor-pembayaran.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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
                    <small class="text-muted d-block">Kasbon</small>
                    <h5 class="font-weight-bold">Daftar Pembayaran</h5>
                </div>

                <div class="top-0 start-0">
                    <div>
                        <!-- Main Content -->
                        <div class="col">
                            <!-- Pencarian -->
                            <form method="GET" action="{{ route('supervisor.pembayaran') }}"  class="d-flex">
                                <div class="input-group search-bar">
                                    <input type="text" class="form-control search-bar" name="search" id="searchBar" placeholder="Cari Karyawan..">
                                    <span class="input-group-text">
                                        <button type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>

                            <!-- Tabel Pembayaran -->
                            <div class="card ">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal Pembayaran</th>
                                                    <th>Saldo Akhir</th>
                                                    <th>Status</th>
                                                    <th>Lampiran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pembayaran as $data)
                                                <tr>
                                                    <td>{{ $data->nip }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->tanggal_pembayaran->format('d/m/Y') }}</td>
                                                    <td>{{ 'Rp ' . number_format($data->saldo_akhir, 0, ',', '.') }}</td>
                                                    <td>
                                                        @if ($data->status === 'Lunas')
                                                            <span class="badge bg-succes">Lunas</span>
                                                        @else
                                                            <span class="badge bg-danger">Belum Lunas</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#" 
                                                        class="btn btn-info btn-round" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#pembayaranModal"
                                                        data-nip="{{ $data->nip }}"
                                                        data-nama="{{ $data->nama }}"
                                                        data-tanggal-bayar="{{ $data->tanggal_pembayaran->format('d/m/Y') }}"
                                                        data-saldo-akhir="{{ $data->saldo_akhir }}"
                                                        data-nominal-dibayar="{{ $data->nominal_dibayar }}"
                                                        data-lampiran="{{ $data->lampiran }}">
                                                            <i class="bi bi-eye"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tbody class="pembayaran-row" id="tableBody">
                                                <tr>
                                                    <td>321</td>
                                                    <td>Kurodia</td>
                                                    <td>Rp 100.000,00</td>
                                                    <td><span class="badge bg-danger">Belum Lunas</span></td>
                                                    <td><a href="#" class="btn btn-info btn-round" data-bs-toggle="modal" data-bs-target="#pembayaranModal">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                    </td>
                                                </tr>
                                            </tbody> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

                <!-- Modal -->
                <div class="modal fade" id="pembayaranModal" tabindex="-1" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>    
                        </div>
                        <h5 class="modal-title" id="pembayaranModalLabel">Pembayaran Kasbon</h5>
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
                                <div class="col-7 bg-gray" id="modal-tanggal-bayar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Nominal Pembayaran:</div>
                                <div class="col-7 bg-gray" id="modal-nominal-dibayar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Saldo Kasbon:</div>
                                <div class="col-7" id="modal-saldo-akhir"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 label-bold">Bukti Pembayaran:</div>
                                <a href="#" target="_blank" class="btn btn-sm btn-light ml-3" id="modal-lampiran">
                                    Preview </a>
                            </div>
                            <div class="container mt-5 text-center">
                                <div class="btn-group-custom justify-content-center">
                                <!-- Tombol Terima -->
                                <button class="btn btn-rounded btn-accept" id="btnTerima">
                                    Terima Pembayaran </button>
                                <!-- Tombol Tolak -->
                                <button class="btn btn-rounded btn-reject" id="btnTolak">
                                    Tolak Pembayaran </button>
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
                            <p>Apakah Anda yakin ingin menerima pembayaran ini?</p>
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
        <!-- end Content -->
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
        //fungsi format rupiah 
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        // Event untuk menampilkan data di modal
        document.addEventListener('DOMContentLoaded', function(){
            const pembayaranModal = document.getElementById('pembayaranModal');

            pembayaranModal.addEventListener('show.bs.modal', function(event){
                // Tombol yang memicu modal
                const button = event.relatedTarget;

                // Ambil data dari tombol
                const nip = button.getAttribute('data-nip');
                const nama = button.getAttribute('data-nama');
                const tanggalBayar = button.getAttribute('data-tanggal-bayar');
                const nominalDibayar = button.getAttribute('data-nominal-dibayar');
                const saldoAkhir = button.getAttribute('data-saldo-akhir');
                const lampiran = button.getAttribute('data-lampiran');

                // Format nominal dengan Rp
                const formattedNominalDibayar = formatRupiah(nominalDibayar);
                const formattedSaldoAkhir = formatRupiah(saldoAkhir);

                // Isi elemen modal dengan data
                document.getElementById('modal-nip').textContent = nip;
                document.getElementById('modal-nama').textContent = nama;
                document.getElementById('modal-tanggal-bayar').textContent = tanggalBayar;
                document.getElementById('modal-nominal-dibayar').textContent = formattedNominalDibayar;
                document.getElementById('modal-saldo-akhir').textContent = formattedSaldoAkhir;

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

        // Event untuk tombol "Terima Pembayaran"
        document.getElementById('btnTerima').addEventListener('click', function() {
            // Tampilkan modal konfirmasi
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();
        });

        // Event untuk tombol "Yakin"
        document.getElementById('btnYakin').addEventListener('click', function () {
            // Logika untuk aksi "Yakin" (misalnya, submit data)
            alert('Pembayaran berhasil diterima!');
            // Tutup modal
            const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
            confirmModal.hide();
        });

        // Event untuk tombol "Tolak Pembayaran"
        document.getElementById('btnTolak').addEventListener('click', function() {
            console.log('Pembayaran dibatalkan.');
        });

    </script>
</body>
</html>
