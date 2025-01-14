@extends('layouts.sidebarmanajer')

@section('content')

@php
    $tokoNames = [
        '1' => 'Hall 8m',
        '2' => 'Grand Hall',
        '3' => 'B6',
        '4' => 'Lt. 2',
        '5' => 'Batik Dasar',
        '6' => 'Gaza',
        '7' => 'B 16',
        '8' => 'Hypermart',
        '9' => 'Online',
        '10' => 'Ladies',
        '11' => 'D36',
        '12' => 'B11',
        '13' => 'Musholla E',
        '14' => 'Batik Dasar 1',
        '15' => 'Tanah Abang LG',
        '16' => 'Tanah Abang Base',
    ];
@endphp

<div class="mb-4">
    <small class="text-muted d-block">Informasi Karyawan</small>
    <h5 class="font-weight-bold">Daftar Karyawan</h5>
</div>
<div class="row align-items-start">
    <div class="col-md-12">
        <div class="mb-3">
            <a href="{{ route('karyawan.create') }}" class="btn btn-success">Tambah Karyawan</a>
           
        </div>
        <div class="card ">
            <div class="card-body">
                 <!-- Kolom Pencarian -->
                 <div class="mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Cari nama karyawan...">
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Toko</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $tokoNames[$karyawan->toko_id] ?? 'Toko Tidak Ditemukan' }}</td>
                                    <td>
                                        <!-- Button to open modal with employee details -->
                                        <button class="btn btn-info" data-toggle="modal" data-target="#viewModal{{ $karyawan->id }}">View</button>
                                        
                                        <!-- Form Delete -->
                                        <form action="{{ route('karyawan.delete', $karyawan->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
    
                                <!-- Modal for viewing and editing employee details -->
                                <div class="modal fade" id="viewModal{{ $karyawan->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true" data-bs-backdrop="static"> 
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel">Detail dan Edit Karyawan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form for Editing Employee -->
                                                <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
    
                                                    <div class="form-group">
                                                        <label for="nip">NIP</label>
                                                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $karyawan->nip }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jabatan">Jabatan</label>
                                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $karyawan->jabatan }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender" required>
                                                        <option value="Laki-laki" {{ $karyawan->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $karyawan->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="toko_id">Toko</label>
                                                        <select class="form-control" id="toko_id" name="toko_id" required>
                                                        <option value="1" {{ $karyawan->toko_id == '1' ? 'selected' : '' }}>Hall 8m</option>
                                                        <option value="2" {{ $karyawan->toko_id == '2' ? 'selected' : '' }}>Grand Hall</option>
                                                        <option value="3" {{ $karyawan->toko_id == '3' ? 'selected' : '' }}>B6</option>
                                                        <option value="4" {{ $karyawan->toko_id == '4' ? 'selected' : '' }}>Lt. 2</option>
                                                        <option value="5" {{ $karyawan->toko_id == '5' ? 'selected' : '' }}>Batik Dasar</option>
                                                        <option value="6" {{ $karyawan->toko_id == '6' ? 'selected' : '' }}>Gaza</option>
                                                        <option value="7" {{ $karyawan->toko_id == '7' ? 'selected' : '' }}>B 16</option>
                                                        <option value="8" {{ $karyawan->toko_id == '8' ? 'selected' : '' }}>Hypermart</option>
                                                        <option value="9" {{ $karyawan->toko_id == '9' ? 'selected' : '' }}>Online</option>
                                                        <option value="10" {{ $karyawan->toko_id == '10' ? 'selected' : '' }}>Ladies</option>
                                                        <option value="11" {{ $karyawan->toko_id == '11' ? 'selected' : '' }}>D36</option>
                                                        <option value="12" {{ $karyawan->toko_id == '12' ? 'selected' : '' }}>B11</option>
                                                        <option value="13" {{ $karyawan->toko_id == '13' ? 'selected' : '' }}>Musholla E</option>
                                                        <option value="14" {{ $karyawan->toko_id == '14' ? 'selected' : '' }}>Batik Dasar 1</option>
                                                        <option value="15" {{ $karyawan->toko_id == '15' ? 'selected' : '' }}>Tanah Abang LG</option>
                                                        <option value="16" {{ $karyawan->toko_id == '16' ? 'selected' : '' }}>Tanah Abang Base</option>
                                                        
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_telp">No Telepon</label>
                                                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $karyawan->no_telp }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank">Bank</label>
                                                        <input type="text" class="form-control" id="bank" name="bank" value="{{ $karyawan->bank }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_rek">No Rekening</label>
                                                        <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ $karyawan->no_rek }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gaji_pokok">Gaji Pokok</label>
                                                        <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ $karyawan->gaji_pokok }}" required>
                                                    </div>
    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const tableBody = document.getElementById('karyawan-table-body');

        searchInput.addEventListener('keyup', function () {
            const query = this.value;

            if (query.length > 0) {
                fetch(`{{ url('karyawan/search') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(karyawan => {
                                tableBody.innerHTML += `
                                    <tr>
                                        <td>${karyawan.nip}</td>
                                        <td>${karyawan.nama}</td>
                                        <td>${karyawan.toko_id}</td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#viewModal${karyawan.id}">View</button>
                                            <form action="/karyawan/${karyawan.id}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                `;
                            });
                        } else {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data karyawan ditemukan.</td>
                                </tr>
                            `;
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                location.reload();
            }
        });

        // Close modal by clicking the close button only
        $('.close').on('click', function() {
            $(this).closest('.modal').modal('hide');
        });
    });
</script>
@endsection
