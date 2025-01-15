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

    <style>
        /* pagination */
        body {
            font-family: 'Poppins', sans-serif;
        }

        #gajiModal .modal-content {
            border-radius: 20px;
            border: 1px solid;
        }

        #gajiModal .modal-title {
            text-align: center;
            font-size: medium;
            background-color: black;
            color: white;
            padding: 3px;
        }

        #gajiModal .modal-body {
            margin: 0 30px 0 30px;
        }

        #gajiModal .modal-body p {
            margin: 1px;
        }

        #gajiModal .modal-footer .btn {
            border-radius: 50px;
            border: 1px solid;
        }

        #gajiModal .tanggal {
            font-size: smaller;
            align-items: center;
            color: black;
        }

        table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
            vertical-align: top;
        }

        table td:first-child {
            text-align: left;
        }

        table td:last-child {
            text-align: right;
        }
    </style>
</head>
<body>
    <div id="gajiModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="tanggal mb-0" style="margin-left: 30px;">Bulan: <span id="modalBulanView">{{ explode(' ', $salary->bulans->bulan_tahun)[0] }}</span></p>
                </div>
                <div class="mt-3" style="text-align: center; font-weight: bold;">
                    <p>JAVA COLLECTION</p>
                </div>
                <h5 class="modal-title" id="modalTitle" style="background-color: rgb(187, 187, 187); color: black;">Slip Gaji</h5>
                <div class="modal-body">
                    <p>NIP<span id="modalNip" style="margin-left: 43px;">: {{ $salary->karyawan_nip }}</span></p>
                    <p>Nama<span id="modalNama" style="margin-left: 28px;">: {{ $salary->nama }}</span></p>
                </div>

                <div class="modal-body">
                    <!-- Modal Edit Gaji -->
                    <table border="1">
                        <tr>
                            <td>Hadir</td>
                            <td><span id="modalKehadiran">{{ $salary->hadir }}</span></td>
                        </tr>
                        <tr>
                            <td>Izin</td>
                            <td><span id="modalIzin">{{ $salary->izin }}</span></td>
                        </tr>
                        <tr>
                            <td>Absen</td>
                            <td><span id="modalAbsen">{{ $salary->absen }}</span></td>
                        </tr>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td>Rp <span id="modalGajiPokok">{{ number_format($salary->gaji_pokok, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td>Denda</td>
                            <td>Rp <span id="modalDenda">{{ number_format($salary->denda, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td>Kasbon</td>
                            <td>Rp <span id="modalKasbon">{{ number_format($salary->kasbon, 0, ',', '.') }}</span></td>
                        </tr>
                    </table>
                </div>
                <h5 class="modal-title" id="modalTitle" style="background-color: rgb(187, 187, 187); color: black;">
                    Gaji diterima: Rp <span id="modalTotal">{{ number_format($salary->total_gaji, 0, ',', '.') }}</span>
                </h5>
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-end align-items-end">
                        <p class="p-1">Jakarta, 1 {{ $salary->bulans->bulan_tahun }}</p>
                        <p class="p-2" style="margin-bottom: 25px;">(Manajer)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
