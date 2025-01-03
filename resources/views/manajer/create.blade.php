@extends('layouts.sidebarmanajer')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="toko_id">Toko ID</label>
            <input type="text" class="form-control" id="toko_id" name="toko_id" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <div class="form-group">
            <label for="bank">Bank</label>
            <input type="text" class="form-control" id="bank" name="bank" required>
        </div>
        <div class="form-group">
            <label for="no_rek">No Rekening</label>
            <input type="text" class="form-control" id="no_rek" name="no_rek" required>
        </div>
        <div class="form-group">
            <label for="kasbon">Kasbon</label>
            <input type="number" class="form-control" id="kasbon" name="kasbon" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('manajer.editkaryawan') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
