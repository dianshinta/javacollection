@extends('layouts.sidebarsupervisor')

@section('content')
<div class="mb-4">
    <small class="text-muted d-block">Informasi Karyawan</small>
    <h5 class="font-weight-bold">Daftar Karyawan</h5>
</div>
<div class="row align-items-start text-capitalize">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>
                                        <!-- Button to open modal with employee details -->
                                        <button class="btn btn-info" data-toggle="modal" data-target="#viewModal{{ $karyawan->id }}">View</button>
                                    </td>
                                </tr>
                            <!-- Modal to show detailed employee info -->
                            <div class="modal fade" id="viewModal{{ $karyawan->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $karyawan->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $karyawan->id }}">Detail Karyawan: {{ $karyawan->nama }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-unstyled">
                                                    <li><strong>NIP:</strong> {{ $karyawan->nip }}</li>
                                                    <li><strong>Nama:</strong> {{ $karyawan->nama }}</li>
                                                    <li><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</li>
                                                    <li><strong>Tempat Lahir:</strong> {{ $karyawan->tempat_lahir }}</li>
                                                    <li><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</li>
                                                    <li><strong>Gender:</strong> {{ $karyawan->gender }}</li>
                                                    <li><strong>Toko ID:</strong> {{ $karyawan->toko_id }}</li>
                                                    <li><strong>Alamat:</strong> {{ $karyawan->alamat }}</li>
                                                    <li><strong>No Telepon:</strong> {{ $karyawan->no_telp }}</li>
                                                    <li><strong>Bank:</strong> {{ $karyawan->bank }}</li>
                                                    <li><strong>No Rekening:</strong> {{ $karyawan->no_rek }}</li>
                                                    <li><strong>Kasbon:</strong> {{ $karyawan->kasbon }}</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data karyawan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection