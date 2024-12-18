<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    // Tampilkan data karyawan
    public function index(Request $request)
    {
        $search = $request->input('search');
        $karyawans = Karyawan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%$search%")
                         ->orWhere('nip', 'like', "%$search%");
        })->get();

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

   
}

