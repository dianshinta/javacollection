<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class EditKaryawanController extends Controller
{

    // Tampilkan data karyawan
    public function karyawans()
    {
  
        $karyawans = Karyawan::all(); // Mengambil semua data karyawan
        return view('manajer.editkaryawan', compact('karyawans')); // View yang benar
    }

    // Simpan data baru atau update
    public function save(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:karyawans,nip,' . $request->id,
            'nama' => 'required',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'toko_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'bank' => 'required',
            'no_rek' => 'required',
            'kasbon' => 'required',
        ]);

        Karyawan::updateOrCreate(
            ['id' => $request->id],
            $request->only('nip', 'nama', 'jabatan','tempat_lahir','tanggal_lahir','gender','toko_id','alamat','no_telp','bank','no_rek','kasbon')
        );

        return redirect()->route('manajer.editkaryawan')->with('success', 'Data berhasil disimpan');
    }

    // Hapus data karyawan
    public function delete($id)
    {
        Karyawan::destroy($id);
        return redirect()->route('manajer.editkaryawan')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
{
    $karyawan = Karyawan::findOrFail($id); // Menemukan karyawan berdasarkan ID
    return view('manajer.editkaryawan', compact('karyawan')); // Kirim data karyawan ke view
}



    // Method untuk menyimpan atau memperbarui data karyawan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|unique:karyawans,nip,' . $id,
            'nama' => 'required',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'toko_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'bank' => 'required',
            'no_rek' => 'required',
            'kasbon' => 'required',
        ]);

        // Update data karyawan
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->nip = $request->input('nip');
        $karyawan->nama = $request->input('nama');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->tempat_lahir = $request->input('tempat_lahir');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->gender = $request->input('gender');
        $karyawan->toko_id = $request->input('toko_id');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->no_telp = $request->input('no_telp');
        $karyawan->bank = $request->input('bank');
        $karyawan->no_rek = $request->input('no_rek');
        $karyawan->kasbon = $request->input('kasbon');

        $karyawan->save();

        // Redirect ke halaman manajer dengan pesan sukses
        return redirect()->route('manajer.editkaryawan')->with('success', 'Data berhasil diperbarui');

    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|unique:karyawans,nip',
            'nama' => 'required',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'toko_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'bank' => 'required',
            'no_rek' => 'required',
            'kasbon' => 'required',
        ]);

        // Simpan data karyawan baru
        Karyawan::create($request->all());

        // Redirect ke halaman daftar karyawan
        return redirect()->route('manajer.editkaryawan')->with('success', 'Karyawan berhasil ditambahkan.');
    }


    public function create()
    {
        return view('manajer.create'); // Pastikan file view bernama create.blade.php
    }

}


