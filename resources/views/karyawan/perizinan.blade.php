<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Perizinan | JAVA COLLECTION
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/perizinan-modal.css" rel="stylesheet" />
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
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false"
                            data-target="#pengajuanDropdown">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p class="d-inline-block mr-5">Pengajuan</p>
                        </a>
                        <div class="collapse" id="pengajuanDropdown">
                            <ul class="nav" style="margin-left: 62px;">
                                <li class=" active">
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
        </div>
    
        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Perizinan</small>
                    <h5 class="font-weight-bold">Riwayat Izinmu</h5>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <button class="btn" type="button" data-toggle="modal" data-target="#perizinanModal"
                            style="background-color: #FFBA6B; border-radius: 18px; font-size: 0.75rem; color: black; padding: 0.8em;">
                            <i class="nc-icon nc-simple-add mr-2"></i>
                            Ajukan izin
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="riwayatTable">
                                        <thead class=" text-primary text-center">
                                            <th>
                                                No
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th>
                                                Alasan
                                            </th>
                                            <th>
                                                Keterangan
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </thead>
                                        <tbody class="text-center">
                                            @if ($perizinans->isEmpty())
                                                <tr>
                                                    <td colspan="6">Tidak ada pengajuan</td>
                                                </tr>
                                            @else
                                                @foreach($perizinans as $index => $perizinan)
                                                <tr style="cursor: pointer;"
                                                    onmouseover="this.style.backgroundColor='#E8E8E8';"
                                                    onmouseout="this.style.backgroundColor='white';"
                                                    data-id="{{ $perizinan->id }}"
                                                    data-tanggal="{{ \Carbon\Carbon::parse($perizinan->tanggal)->format('Y-m-d') }}"
                                                    data-jenis="{{ $perizinan->jenis }}"
                                                    data-keterangan="{{ $perizinan->keterangan }}"
                                                    data-status="{{ $perizinan->status }}"
                                                    data-file="{{ $perizinan->lampiran }}"
                                                >
                                                    <td>
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($perizinan->tanggal)->translatedFormat('j F Y') }}
                                                    </td>
                                                    <td>
                                                        {{ ucfirst($perizinan->jenis) }}
                                                    </td>
                                                    <td>
                                                        {{ $perizinan->keterangan }}
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $perizinan->status == 'Diproses' ? 'bg-warning' : ($perizinan->status == 'Ditolak' ? 'bg-danger' : 'bg-success') }}">
                                                            {{ ucfirst($perizinan->status) }}
                                                        </span>
                                                    </td>
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

                <!-- Perizinan Modal -->
                <div class="modal fade" id="perizinanModal" tabindex="-1" aria-labelledby="perizinanModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h5 class="modal-title" id="perizinanModalLabel">Formulir Perizinan</h5>
                            <div class="modal-body">
                                <form id="formPerizinan" action="{{ route('perizinan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nip" value={{ Auth::user()->nip }}> <!-- Isi sesuai kebutuhan -->
                                    <input type="hidden" name="nama" value={{ Auth::user()->name }}> <!-- Isi sesuai kebutuhan -->
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Tanggal:</div>
                                        <div class="col-7 bg-gray">
                                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Jenis:</div>
                                        <div class="col-7">
                                            <div class="container">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisSakit"
                                                        value="Sakit" required>
                                                    <label class="form-check-label text-black" for="jenisSakit">Sakit</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisCuti"
                                                        value="Cuti" {{ $izinTaken >=2 ? 'disabled' : '' }}>
                                                    <label class="form-check-label text-black" for="jenisCuti">Cuti</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisLain"
                                                        value="Lainnya">
                                                    <label class="form-check-label text-black" for="jenisLain">Lainnya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Keterangan:</div>
                                        <div class="col-7">
                                            <textarea id="keterangan" name="keterangan" class="form-control p-2"
                                                placeholder="Masukkan keterangan izin" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Bukti:</div>
                                        <div class="col-7">
                                            <div class="button-container">
                                                <button id="btn-tambah" type="button" class="custom-button" data-toggle="modal"
                                                    data-target="#buktiModal">
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-5 text-center justify-content-center">
                                        <div class="btn-group-custom justify-content-center">
                                            <button type="button" class="btn btn-save" id="savePerizinan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Perizinan Modal -->
                <div class="modal fade" id="updatePerizinanModal" tabindex="-1" aria-labelledby="perizinanModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h5 class="modal-title" id="perizinanModalLabel">Ubah Izin</h5>
                            <div class="modal-body">
                                <form id="formUpdatePerizinan" action="{{ route('perizinan.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nip" value={{ Auth::user()->nip }}> <!-- Isi sesuai kebutuhan -->
                                    <input type="hidden" name="nama" value={{ Auth::user()->name }}> <!-- Isi sesuai kebutuhan -->
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Tanggal:</div>
                                        <div class="col-7 bg-gray">
                                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Jenis:</div>
                                        <div class="col-7">
                                            <div class="container">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisSakit"
                                                        value="Sakit" required>
                                                    <label class="form-check-label text-black" for="jenisSakit">Sakit</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisCuti"
                                                        value="Cuti">
                                                    <label class="form-check-label text-black" for="jenisCuti">Cuti</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis" id="jenisLain"
                                                        value="Lainnya">
                                                    <label class="form-check-label text-black" for="jenisLain">Lainnya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Keterangan:</div>
                                        <div class="col-7">
                                            <textarea id="keterangan" name="keterangan" class="form-control p-2"
                                                placeholder="Masukkan keterangan izin" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 label-bold">Bukti:</div>
                                        <div class="col-7">
                                            <div class="button-container">
                                                <button id="btn-tambahUpdate" type="button" class="custom-button" data-toggle="modal"
                                                    data-target="#buktiModalUpdate">
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-5 text-center justify-content-center">
                                        <div class="btn-group-custom justify-content-center">
                                            <button type="button" class="btn btn-save" id="changePerizinan">Ubah</button>
                                            <button type="button" class="btn btn-danger" id="deletePerizinan">Hapus Izin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
                    aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <p>Ajukan izin ini?</p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-success" id="btnYakin">Ya, ajukan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnBatal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Update -->
                <div class="modal fade" id="confirmUpdateModal" tabindex="-1" role="dialog" aria-labelledby="confirmUpdateModalLabel"
                    aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <p>Ubah izin ini?</p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-success" id="btnYakinUpdate">Ya, ubah</button>
                                    <button type="button" class="btn btn-danger close" data-dismiss="modal" id="btnBatal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Delete-->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
                    aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <p>Hapus izin ini?</p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-success" id="btnYakinDelete">Ya, hapus</button>
                                    <button type="button" class="btn btn-danger close" data-dismiss="modal" id="btnBatal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Box for Tambah Bukti -->
                <div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form class="lampiran-body" enctype="multipart/form-data">
                                    <!-- Field untuk Upload File -->
                                    <div class="form-group">
                                        <label for="fileUpload" class="form-label font-weight-bold">Unggah File Bukti Izin</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileUpload" name="lampiran"
                                                    accept="image/*, .pdf, .doc, .docx">
                                                <label class="custom-file-label" for="fileUpload">Pilih file...</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted mt-1">
                                            Dapat mengunggah file dengan format: JPG, PNG, PDF, DOC, DOCX.
                                        </small>
                                    </div>
                                    <!-- Display Nama File -->
                                    <div class="form-group">
                                        <p id="fileNameDisplay" class="text-secondary"></p>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="btn-batalLampiran" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success" id="btn-saveLampiran">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Box for Tambah Bukti Update -->
                <div class="modal fade" id="buktiModalUpdate" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form class="lampiran-body" enctype="multipart/form-data">
                                    <!-- Field untuk Upload File -->
                                    <div class="form-group">
                                        <label for="fileUploadUpdate" class="form-label font-weight-bold">Unggah File Bukti Izin</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileUploadUpdate" name="lampiran"
                                                    accept="image/*, .pdf, .doc, .docx">
                                                <label class="custom-file-label" for="fileUploadUpdate">Pilih file...</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted mt-1">
                                            Dapat mengunggah file dengan format: JPG, PNG, PDF, DOC, DOCX.
                                        </small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="btn-batalLampiranUpdate" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success" id="btn-saveLampiranUpdate">Simpan</button>
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
                                    ©
                                    <script>
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
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
        <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
                demo.initChartsPages();
            });
        </script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let uploadedFile = null;  // Menyimpan lampiran sementara

                // Menampilkan nama file setelah dipilih
                $('#fileUpload').on('change', function () {
                    const fileName = this.files[0]?.name || 'Tidak ada file yang dipilih';
                    $(this).next('.custom-file-label').text(fileName);

                    uploadedFile = this.files[0];
                });

                // Saat tombol "Simpan Lampiran" diklik
                $('#btn-saveLampiran').on('click', function () {
                    if (!uploadedFile) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Peringatan',
                            text: 'Tidak ada file lampiran yang diunggah!',
                        });
                    } else {
                        const fileName = uploadedFile.name;
                        $('#btn-tambah').text('Ganti File');  // Ganti teks tombol dengan nama file
                        // Pastikan tombol hanya muncul jika file diunggah
                        $('#btn-fileName').remove(); // Menghapus tombol lama (jika ada)
                        $('#btn-tambah').before(`
                            <button id="btn-fileName" class="btn btn-info mt-2" disabled>${fileName}</button>
                        `);
                        
                        $('#buktiModal').modal('hide');
                    }
                });
                
                $('#btn-batalLampiran').on('click', function () {
                    $('#buktiModal').modal('hide');
                    $('.custom-file-label').text('Pilih file...');
                    $('#fileUpload').val(''); // Mengosongkan nilai input file
                });

                $('#btn-batalLampiranUpdate').on('click', function () {
                    $('#buktiModalUpdate').modal('hide');
                    $('.custom-file-label').text('Pilih file...');
                    $('#fileUploadUpdate').val(''); // Mengosongkan nilai input file
                });

                // Ketika tombol Simpan pada modal perizinan diklik
                $('#savePerizinan').on('click', function () {
                    // Validasi form: cek apakah semua field yang required sudah diisi
                    var isValid = true;
                    var requiredFields = $('#formPerizinan').find('[required]'); // Mencari semua input yang wajib diisi

                    requiredFields.each(function () {
                        if ($(this).val() === '') {
                            isValid = false;
                            $(this).addClass('is-invalid'); // Menambahkan class is-invalid untuk memberi tanda
                            $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan validasi sebelumnya
                            $(this).after('<div class="invalid-feedback">Field ini harus diisi.</div>'); // Menambahkan pesan peringatan
                        } else {
                            $(this).removeClass('is-invalid'); // Menghapus class is-invalid jika field terisi
                            $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan validasi
                        }
                    });

                    // Validasi khusus untuk radio button "jenis"
                    var jenisSelected = $('input[name="jenis"]:checked').length > 0; // Cek apakah ada yang dipilih
                    if (!jenisSelected) {
                        isValid = false;
                        if ($('#jenisError').length === 0) {
                            // Tambahkan pesan validasi jika belum ada
                            $('input[name="jenis"]').closest('.container').append(
                                '<div id="jenisError" class="mt-2" style="font-size: 12px; color: red">Harap pilih salah satu jenis izin.</div>'
                            );
                        }
                    } else {
                        // Hapus pesan validasi jika sudah dipilih
                        $('#jenisError').remove();
                    }

                    // Validasi tanggal tidak boleh sebelum hari ini
                    var today = new Date();
                    var yyyy = today.getFullYear();
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                    var dd = String(today.getDate()).padStart(2, '0');
                    var minDate = `${yyyy}-${mm}-${dd}`;

                    $('#formPerizinan').find('input[type="date"]').each(function () {
                        if ($(this).val() < minDate) {
                            isValid = false;
                            $(this).addClass('is-invalid');
                            $(this).siblings('.invalid-feedback').remove();
                            $(this).after('<div class="invalid-feedback">Tanggal tidak boleh sebelum hari ini.</div>');
                        } else {
                            $(this).removeClass('is-invalid');
                            $(this).siblings('.invalid-feedback').remove();
                        }
                    });

                    // Jika ada field yang kosong, tampilkan pesan dan hentikan proses
                    if (!isValid) {
                        return false; // Jangan lanjutkan ke proses selanjutnya
                    }

                    // Menampilkan modal konfirmasi
                    $('#confirmModal').modal('show');
                });

                // Ketika tombol "Yakin" pada modal konfirmasi diklik
                $('#btnYakin').on('click', function () {
                    // Mengambil data dari form perizinan
                    var formData = new FormData($('#formPerizinan')[0]);
                    if(uploadedFile) {
                        formData.append('lampiran', uploadedFile);
                    }

                    // Menutup modal konfirmasi
                    $('#confirmModal').modal('hide');

                    // Mengirimkan data ke server menggunakan AJAX
                    $.ajax({
                        url: $('#formPerizinan').attr('action'), // Mengambil URL dari atribut action form
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Izin Berhasil Diajukan!',
                                showConfirmButton: false,
                                timer: 1500,
                                willClose: () => {
                                    // Reload halaman setelah SweetAlert tertutup
                                    location.reload();
                                }
                            });
                        },
                        error: function (xhr, status, error) {
                            // Menangani error
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                });

                // Ketika tombol "Batal" pada modal konfirmasi diklik
                $('#btnBatal').on('click', function () {
                    // Menutup modal konfirmasi tanpa mengirim data
                    $('#confirmModal').modal('hide');
                });

                const rows = document.querySelectorAll("#riwayatTable tbody tr");
                rows.forEach(row => {
                    // Menampilkan nama file setelah dipilih
                    $(document).on('change', '#fileUploadUpdate', function () {
                        const fileNameUpdate = this.files[0]?.name || 'Tidak ada file yang dipilih';
                        $(this).next('.custom-file-label').text(fileNameUpdate);

                        uploadedFile = this.files[0];        
                    });

                    // Saat tombol "Simpan Lampiran" diklik
                    $(document).on('click', '#btn-saveLampiranUpdate',function () {
                        if (!uploadedFile) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan',
                                text: 'Tidak ada file lampiran yang diunggah!',
                            });
                        } else {
                            const fileNameUpdate = uploadedFile.name;
                            $('#buktiModalUpdate').modal('hide');
                            $('#btn-tambahUpdate').text('Ganti File');  // Ganti teks tombol dengan nama file
                    
                            // Pastikan tombol hanya muncul jika file diunggah
                            $('#btn-fileNameUpdate').remove(); // Menghapus tombol lama (jika ada)
                            $('#btn-tambahUpdate').before(`
                                <button id="btn-fileNameUpdate" class="btn btn-info mt-2" disabled>${fileNameUpdate}</button>
                            `); 
                        }
                    });

                    $(document).off('click', '#btn-fileNameUpdate');

                    row.addEventListener("click", () => {
                        // Ambil data dari atribut data-*
                        const id = row.getAttribute("data-id");
                        const tanggal = row.getAttribute("data-tanggal");
                        const jenis = row.getAttribute("data-jenis");
                        const keterangan = row.getAttribute("data-keterangan");
                        const status = row.getAttribute("data-status");
                        const lampiran = row.getAttribute("data-file");

                        // Isi data di dalam modal
                        document.querySelector("#formUpdatePerizinan #tanggal").value = tanggal; // Set tanggal
                        document.querySelectorAll(`#formUpdatePerizinan input[name="jenis"][value="${jenis}"]`).forEach((radio) => {
                            if (radio.value === jenis) {
                                radio.checked = true;
                            }
                        }); // Set jenis (radio)
                        document.querySelector("#formUpdatePerizinan #keterangan").value = keterangan; // Set keterangan

                        // Jika ada lampiran
                        if (lampiran) {
                            const fileName = lampiran.split('/').pop(); // Ambil nama file dari path lampiran

                            $('#btn-tambahUpdate').text('Ganti File');  // Ganti teks tombol dengan nama file

                            // Pastikan tombol hanya muncul jika file diunggah
                            $('#btn-fileNameUpdate').remove(); // Menghapus tombol lama (jika ada)
                            $('#btn-tambahUpdate').before(
                                `<button id="btn-fileNameUpdate" class="btn btn-info mt-2">${fileName}</button>`
                            );
                        }

                        // Hapus event listener yang lama
                        $(document).off('click', '#btn-fileNameUpdate');

                        // Ketika tombol Lihat Lampiran diklik, buka file di tab baru
                        $(document).on('click', '#btn-fileNameUpdate', function (event) {
                            event.preventDefault();
                            const fileUrl = "/storage/" + lampiran; // Ambil URL file dari data-file
                            window.open(fileUrl, '_blank'); // Buka file di tab baru
                        });

                        // Tampilkan modal
                        const modal = new bootstrap.Modal(document.getElementById("updatePerizinanModal"));
                        modal.show();

                        if (status != 'Diproses') {
                            document.querySelector("#formUpdatePerizinan #tanggal").disabled = true;
                            document.querySelectorAll(`input[name="jenis"]`).forEach((radio) => {
                                radio.disabled = true;
                            });
                            document.querySelector("#formUpdatePerizinan #keterangan").disabled = true; // Set keterangan
                            document.getElementById('deletePerizinan').disabled = true;
                        }
                        // Ketika tombol Ubah pada modal perizinan diklik
                        $(document).off('click', '#changePerizinan').on('click', '#changePerizinan', function () {
                            // Validasi form: cek apakah semua field yang required sudah diisi
                            var isValid = true;
                            var requiredFields = $('#formUpdatePerizinan').find('[required]'); // Mencari semua input yang wajib diisi

                            requiredFields.each(function () {
                                if ($(this).val() === '') {
                                    isValid = false;
                                    $(this).addClass('is-invalid'); // Menambahkan class is-invalid untuk memberi tanda
                                    $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan validasi sebelumnya
                                    $(this).after('<div class="invalid-feedback">Field ini harus diisi.</div>'); // Menambahkan pesan peringatan
                                } else {
                                    $(this).removeClass('is-invalid'); // Menghapus class is-invalid jika field terisi
                                    $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan validasi
                                }
                            });

                            // Validasi tanggal tidak boleh sebelum hari ini
                            var today = new Date();
                            var yyyy = today.getFullYear();
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                            var dd = String(today.getDate()).padStart(2, '0');
                            var minDate = `${yyyy}-${mm}-${dd}`;

                            $('#formUpdatePerizinan').find('input[type="date"]').each(function () {
                                if ($(this).val() < minDate) {
                                    isValid = false;
                                    $(this).addClass('is-invalid');
                                    $(this).siblings('.invalid-feedback').remove();
                                    $(this).after('<div class="invalid-feedback">Tanggal tidak boleh sebelum hari ini.</div>');
                                } else {
                                    $(this).removeClass('is-invalid');
                                    $(this).siblings('.invalid-feedback').remove();
                                }
                            });

                            // Validasi khusus untuk radio button "jenis"
                            var jenisSelected = $('input[name="jenis"]:checked').length > 0; // Cek apakah ada yang dipilih
                            if (!jenisSelected) {
                                isValid = false;
                                if ($('#jenisError').length === 0) {
                                    // Tambahkan pesan validasi jika belum ada
                                    $('input[name="jenis"]').closest('.container').append(
                                        '<div id="jenisError" class="mt-2" style="font-size: 12px; color: red">Harap pilih salah satu jenis izin.</div>'
                                    );
                                }
                            } else {
                                // Hapus pesan validasi jika sudah dipilih
                                $('#jenisError').remove();
                            }

                            // Jika ada field yang kosong, tampilkan pesan dan hentikan proses
                            if (!isValid) {
                                return false; // Jangan lanjutkan ke proses selanjutnya
                            }

                            

                            // Menampilkan modal konfirmasi
                            $('#confirmUpdateModal').modal('show');
                        });

                        // Ketika tombol "Yakin" pada modal konfirmasi diklik
                        $(document).on('click', '#btnYakinUpdate', function () {
                            const dataTanggal = document.querySelector("#formUpdatePerizinan #tanggal").value;
                            const dataJenis = document.querySelector("#formUpdatePerizinan input[name='jenis']:checked")?.value;
                            const dataKeterangan = document.querySelector("#formUpdatePerizinan #keterangan").value;

                            // const perizinanId = document.querySelector("#updatePerizinanModal").getAttribute("data-id");
                            // Kirim data ke server menggunakan AJAX
                            const formData = new FormData();
                            formData.append("tanggal", dataTanggal);
                            formData.append("jenis", dataJenis);
                            formData.append("keterangan", dataKeterangan);
                            formData.append("id", id);  // ID untuk mengidentifikasi perizinan yang akan diupdate
                            formData.append("_token", "{{ csrf_token() }}");  // Token CSRF untuk keamanan

                            // Cek apakah ada file lampiran yang diupload
                            if (uploadedFile) {
                                formData.append('lampiran', uploadedFile); // Tambahkan file lampiran ke form data
                            }

                            // Gunakan fetch API untuk mengirim data ke server
                            fetch("{{ route('perizinan.update') }}", {
                                method: "POST",
                                body: formData
                            })
                                .then(response => {
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: 'Perizinan berhasil diperbarui!',
                                            showConfirmButton: false,
                                            timer: 1500,
                                            willClose: () => {
                                            // Reload halaman setelah SweetAlert tertutup
                                            location.reload();
                                            }
                                        });
                                        $('#confirmUpdateModal').modal('hide');

                                        // Update tampilan tabel di halaman
                                        const row = document.querySelector(`#riwayatTable tbody tr[data-id='${id}']`);
                                        row.querySelector("td:nth-child(2)").textContent = new Date(dataTanggal).toLocaleDateString(); // Update tanggal
                                        row.querySelector("td:nth-child(3)").textContent = dataJenis.charAt(0).toUpperCase() + dataJenis.slice(1); // Update jenis
                                        row.querySelector("td:nth-child(4)").textContent = dataKeterangan; // Update keterangan
                                        row.querySelector("td:nth-child(5)").innerHTML = `<span class="badge bg-warning">Diproses</span>`; // Update status jika perlu

                                        // Tutup modal
                                        const modal = new bootstrap.Modal(document.getElementById("updatePerizinanModal"));
                                        modal.hide();
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.message || 'Gagal memperbarui perizinan. Coba lagi.',
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error("Error:", error);
                                    alert("Terjadi kesalahan. Coba lagi.");
                                });
                        });

                        $(document).on('click', '#deletePerizinan', function () {
                            $('#confirmDeleteModal').modal('show');
                        });
                        
                        $(document).on('click', '#btnYakinDelete', function () {
                            const formData = new FormData();
                            formData.append("id", id);  // ID untuk mengidentifikasi perizinan yang akan diupdate
                            formData.append("_token", "{{ csrf_token() }}");  // Token CSRF untuk keamanan

                            // Gunakan fetch API untuk mengirim data ke server
                            fetch("{{ route('perizinan.delete') }}", {
                                method: "POST",
                                body: formData
                            })
                                .then(response => {
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: 'Perizinan berhasil dihapus!',
                                            showConfirmButton: false,
                                            timer: 1500,
                                            willClose: () => {
                                                row.remove();
                                                // Reload halaman setelah SweetAlert tertutup
                                                location.reload();
                                            }
                                        });
                                        $('#confirmDeleteModal').modal('hide');

                                        // Tutup modal
                                        const modal = new bootstrap.Modal(document.getElementById("updatePerizinanModal"));
                                        modal.hide();
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.message || 'Gagal menghapus perizinan. Coba lagi.',
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error("Error:", error);
                                    alert("Terjadi kesalahan. Coba lagi.");
                                });
                            });
                        }); 
                    });


            // Tambahkan event listener untuk memanage tombol setelah modal ditutup
            $('#perizinanModal').on('hidden.bs.modal', function () {
                // Hapus semua pesan validasi
                $('#formPerizinan').find('.is-invalid').removeClass('is-invalid');
                $('#formPerizinan').find('.invalid-feedback').remove();
                $('#jenisError').remove(); // Hapus pesan validasi khusus radio button

                // Reset input form
                $('#formPerizinan')[0].reset();

                uploadedFile = null;

                $('.custom-file-label').text('Pilih file...');

                $('#btn-fileName').remove(); // Sembunyikan tombol file
                $('#btn-tambah').text('Tambah'); // Kembalikan teks tombol
                $('#btn-fileNameUpdate').remove(); // Sembunyikan tombol file
                $('#btn-tambahUpdate').text('Tambah'); // Kembalikan teks tombol
            });
        });

        // Menutup modal bukti
        $('#buktiModal').on('hidden.bs.modal', function () {
            // Mengecek apakah modal perizinan masih terbuka
            if ($('#perizinanModal').hasClass('show')) {
                // Kembalikan overflow pada body dan html ke normal
                $('#perizinanModal').css('overflow', 'auto');
            }
        });

        // Menutup modal bukti update
        $('#buktiModalUpdate').on('hidden.bs.modal', function () {
            // Mengecek apakah modal perizinan masih terbuka
            if ($('#updatePerizinanModal').hasClass('show')) {
                // Kembalikan overflow pada body dan html ke normal
                $('#updatePerizinanModal').css('overflow', 'auto');
            }
        });

        </script>
</body>
</html>