<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        JAVA COLLECTION | Gaji
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="../assets/css/manajer-gaji.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
  <!-- Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper m-auto">
        {{-- navbar --}}
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
              <span class="simple-text font-weight-bold">
                JAVA COLLECTION
              </span>
            </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li>
                  <a href="{{route('manager.beranda')}}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>Beranda</p>
                  </a>
                </li>
                <li class="active">
                  <a href="{{route('manajer.gaji')}}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Gaji</p>
                  </a>
                </li>
                <li>
                <a href="{{ route('manajer.editkaryawan') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Karyawan</p>
                  </a>
                </li>
              </ul>
            </div>
        </div>
    
        <!-- Content -->
        <div class="main-panel">
            <div class="content">
                <div class="mb-4">
                    <small class="text-muted d-block">Gaji</small>
                    <h5 class="font-weight-bold">Daftar Gaji</h5>
                </div>
                
                <div class="row align-items-start">
                    <!-- Main Content -->
                    <div class="col-md-12">
                        <!-- Button Atur Bonus -->
                        <button class="btn-bonus mb-3" id="btnBonus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 20">
                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                            </svg> 
                            Atur Bonus
                        </button>
                        <!-- Pencarian -->
                        <form method="GET" action="" class="d-flex">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control search-input" name="search" id="searchBar" placeholder="Cari Karyawan.." value="{{ $search ?? '' }}">
                                <button type="submit" class="search-btn">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
    
                        <!-- Tabel Gaji -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                </tr>
                            </thead>
                            @foreach ($datas as $data)
                            <tbody class="gaji-row" data-id="{{ $data['user_nip'] }}">
                                <tr>
                                    <td> {{ $data['user_nip'] }}</td> 
                                    <td>{{ Str::limit($data->karyawan->name, 20) }}</td>
                                    <td>{{ $data->karyawan->jabatan }}</td>
                                </tr>
                            </tbody>   
                            @endforeach
                        </table>
                    </div>
                </div>
            
                <!-- Modal Box for Atur Bonus -->
                <div class="modal fade" id="bonusModal" tabindex="-1" role="dialog" aria-labelledby="bonusModalLabel" aria-hidden="true" style="margin-top: 8%">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title pb-3" id="bonusModalLabel">Atur Bonus</h5>
                                <form class="bonus-body">
                                    <!-- Dropdown for Cabang -->
                                    <div class="form-group">
                                        <select class="form-select form-select-sm fw-bold" id="branchSelect">
                                            <option value="cabang1">Cabang 1</option>
                                            <option value="cabang2">Cabang 2</option>
                                            <option value="cabang3">Cabang 3</option>
                                            <option value="cabang4">Cabang 4</option>
                                        </select>
                                    </div>
            
                                    <!-- Input for Bonus Amount -->
                                    <div class="form-group">
                                        <label for="bonusAmount">Penjualan per Bulan</label>
                                        <input type="number" class="form-control" id="bonusAmount" placeholder="Masukkan Jumlah Penjualan">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer mx-auto">
                                <button type="button" class="btn btn-atur" id="saveBonus">
                                    Atur
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal Box for Kirim Gaji -->
                <div class="modal fade" id="gajiModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="tanggal">    Tanggal : 
                                    @isset($data->created_at)
                                        {{ $data->created_at->format('j F Y') }}
                                    @else
                                        ""
                                    @endisset</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h5 class="modal-title" id="modalTitle">Rincian Gaji</h5>
                            <div class="modal-body">
                                <p>NIP: <span id="modalNip"> </span></p>
                                <p>Nama: <span id="modalNama"></span></p>
                                <p>Jabatan: <span id="modalJabatan"></span></p>
                                <!-- Modal Edit Gaji -->
                                <div class="editable-gaji pt-3">
                                    <div>
                                        <label for="editKehadiran">Hadir: </label>
                                        <span id="modalKehadiran"></span>
                                    </div>
                                    <div>
                                        <label for="editIzin">Izin: </label>
                                        <span id="modalIzin"></span>
                                    </div>
                                    <div>
                                        <label for="editAbsen">Absen: </label>
                                        <span id="modalAbsen"></span>
                                    </div>
                                    <div>
                                        <label for="editGajiPokok">Gaji Pokok: </label>
                                        <span id="modalGajiPokok"></span>
                                    </div>
                                    <div>
                                        <label for="editDenda">denda: </label>
                                        <span id="modalDenda"></span>
                                    </div>
                                    <div>
                                        <label for="editKasbon">Kasbon: </label>
                                        <span id="modalKasbon"></span>
                                    </div>
                                    <div style="text-align: right;">
                                        <p>Jumlah <br>Rp.  <span id="modalTotal"></span></p>
                                    </div>
                                </div>    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn success sendSalary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 20">
                                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                                    </svg>
                                    Kirim
                                </button>
                                <button type="button" class="btn edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 20">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin mengirim data ini?
                                <br>
                                <button type="button" class="btn success" id="btnYakin">Yakin</button>
                                <button type="button" class="btn btn-danger" id="btnBatal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

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

    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
        });
    </script>

    <!-- Script to handle bonus modal opening -->
    <script>
        $(document).ready(function() {
            // Show modal without fade effect when 'Atur Bonus' button is clicked
            $('#btnBonus').click(function() {
                $('#bonusModal').modal({
                    backdrop: 'static', // Disable closing by clicking outside the modal
                    keyboard: false // Disable closing with the ESC key
                });
                $('#bonusModal').modal('show');
            });

            // Optional: handle save button click
            $('#saveBonus').click(function () {
                const branch = $('#branchSelect').val();
                const amount = $('#bonusAmount').val();

                if (!amount || amount <= 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Input Tidak Valid',
                        text: 'Masukkan jumlah penjualan yang valid.',
                    });
                    return; // Hentikan proses jika input tidak valid
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Bonus Diatur!',
                    text: 'Bonus berhasil disimpan.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Kosongkan input setelah SweetAlert selesai
                    $('#bonusAmount').val('');
                });
            });
        });
    </script>

    <!-- Script to handle kirim gaji modal opening -->
    <script>
        $(document).ready(function () {
            $('.gaji-row').click(function () {
                const nip = $(this).data('id');

                // Cari data yang cocok dengan NIP tersebut
                const data = @json($datas).find(item => item.user_nip == nip);
       
            
            // Isi data ke dalam modal
            if (data) {
                $('#modalNip').text(data.user_nip);
                $('#modalNama').text(data.nama);
                $('#modalJabatan').text(data.jabatan);
                $('#modalKehadiran').text(data.hadir);
                $('#modalIzin').text(data.izin);
                $('#modalGajiPokok').text(data.gaji_pokok);
                $('#modalAbsen').text(data.absen);
                $('#modalDenda').text(data.denda);
                $('#modalKasbon').text(data.kasbon);
                $('#modalTotal').text(data.total_gaji);

                // Tampilkan modal
                $('#gajiModal').modal('show');
            } else {
                console.error('Data tidak ditemukan untuk ID:', id);
            }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Tombol "Kirim" di modal utama
            $('.sendSalary').click(function () {
                $('#confirmModal').modal('show'); // Tampilkan modal konfirmasi
            });

            // Tombol "Yakin" di modal konfirmasi
            $('#btnYakin').click(function () {
                alert('Data berhasil dikirim!'); // Eksekusi aksi pengiriman
                $('#confirmModal').modal('hide'); // Tutup modal konfirmasi
                $('#gajiModal').modal('hide'); // Tutup modal utama
            });

            // Tombol "Batal" di modal konfirmasi
            $('#btnBatal').click(function () {
                $('#confirmModal').modal('hide'); // Tutup modal konfirmasi tanpa aksi
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            let isEditing = false;

            $('.edit').click(function () {
                if (!isEditing) {
                    // Ubah elemen menjadi input
                    $('#modalKehadiran').replaceWith('<input type="text" class="form-control" id="editKehadiran" value="' + $('#modalKehadiran').text().trim() + '">');
                    $('#modalBonus').replaceWith('<input type="text" class="form-control" id="editBonus" value="' + $('#modalBonus').text().trim() + '">');
                    $('#modalKasbon').replaceWith('<input type="text" class="form-control" id="editKasbon" value="' + $('#modalKasbon').text().trim() + '">');
                    $('#modalTunjangan').replaceWith('<input type="text" class="form-control" id="editTunjangan" value="' + $('#modalTunjangan').text().trim() + '">');
                    $('#modalPotongan').replaceWith('<input type="text" class="form-control" id="editPotongan" value="' + $('#modalPotongan').text().trim() + '">');
                    
                    // Ubah tombol Edit menjadi Simpan
                    $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 20"><path d="M11 2H9v3h2z"/><path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/></svg> Simpan')
                        .addClass('save')
                        .removeClass('edit')
                        .css({
                            "background-color": "#5bdaf2", 
                            "color": "rgb(0, 0, 0)", 
                            "border-color": "rgb(0, 0, 0)" 
                        });
                    $('.sendSalary').hide();
                    isEditing = true;
                } else {
                    // Simpan perubahan
                    $('#editKehadiran').replaceWith('<span id="modalKehadiran">' + $('#editKehadiran').val().trim() + '</span>');
                    $('#editBonus').replaceWith('<span id="modalBonus">' + $('#editBonus').val().trim() + '</span>');
                    $('#editKasbon').replaceWith('<span id="modalKasbon">' + $('#editKasbon').val().trim() + '</span>');
                    $('#editTunjangan').replaceWith('<span id="modalTunjangan">' + $('#editTunjangan').val().trim() + '</span>');
                    $('#editPotongan').replaceWith('<span id="modalPotongan">' + $('#editPotongan').val().trim() + '</span>');
                    
                    // Ubah tombol Simpan kembali ke Edit
                    $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 20"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg> Edit')
                        .addClass('edit')
                        .removeClass('save')
                        .css({
                            "background-color": "", // Reset background
                            "color": "", // Reset teks
                            "border-color": "" // Reset border
                        });
                    $('.sendSalary').show();
                    isEditing = false;
                }
            });
        });
    </script>
</body>
</html>