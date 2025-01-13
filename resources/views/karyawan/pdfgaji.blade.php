<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>

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
</head>
<body>
    <div id="gajiModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="tanggal mb-0">    Bulan : <span id="modalBulanView"> </span> <span id="modalBulan" hidden> </span> </p>
                </div>
                <div class="mt-3" style="text-align: center; font-weight: bold;">
                    <P>JAVA COLLECTION</P>
                </div>
                <h5 class="modal-title" id="modalTitle" style="background-color: rgb(187, 187, 187); color: black;">Slip Gaji</h5>
                <div class="modal-body">
                    <p>NIP: <span id="modalNip"> </span></p>
                    <p>Nama: <span id="modalNama"></span></p>
                    <p>Jabatan: <span id="modalJabatan"></span></p>
                </div>
                
                <h5 class="modal-title" id="modalTitle" style="background-color: rgb(215, 215, 215); color: rgb(215, 215, 215); font-size: 10px;">SLip</h5>
                <div class="modal-body">
                    <!-- Modal Edit Gaji -->
                    <div class="editable-gaji pt-3">
                        <div>
                            <label for="editKehadiran">Hadir: </label>
                            <span id="modalKehadiran">{{  }}</span>
                        </div>
                        <div>
                            <label for="editIzin">Izin: </label>
                            <span id="modalIzin">{{  }}</span>
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
                    </div>
                </div>
                <h5 class="modal-title" id="modalTitle" style="background-color: rgb(187, 187, 187); color: black;">
                    Gaji diterima: Rp.  <span id="modalTotal"></span>
                </h5>
                <div class="modal-body">        
                    <div class="d-flex flex-column justify-content-end align-items-end">
                        <p class="p-1">Jakarta, 1 -bulan- -tahun-</p>
                        <p class="p-2">Dzikra</p>
                        <p class="p-2">(Manajer)</p>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
