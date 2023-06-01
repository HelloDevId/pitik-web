<?php

namespace App\Http\Controllers;

use App\Models\TenagaKerja;
use Illuminate\Http\Request;

class TenagaKerjaController extends Controller
{
    public function index()
    {
        $tenagakerja = TenagaKerja::all();
        return view('admin.pages.datatenagakerja', [
            'tenagakerja' => $tenagakerja,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'total_gaji' => 'required',
        ], [
                'nama_karyawan.required' => 'Nama tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'gaji.required' => 'Gaji tidak boleh kosong',
                'total_gaji.required' => 'Total Gaji tidak boleh kosong',
            ]);

        $totalgaji = $request->gaji * $request->total_gaji;

        TenagaKerja::create([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
            'total_gaji' => $totalgaji,
        ]);

        return redirect('/datatenagakerja')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'total_gaji' => 'required',
        ], [
                'nama_karyawan.required' => 'Nama tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'gaji.required' => 'Gaji tidak boleh kosong',
                'total_gaji.required' => 'Total Gaji tidak boleh kosong',
            ]);

        $totalgaji = $request->gaji * $request->total_gaji;

        $tenagakerja = TenagaKerja::find($id);
        $tenagakerja->nama_karyawan = $request->nama_karyawan;
        $tenagakerja->jabatan = $request->jabatan;
        $tenagakerja->gaji = $request->gaji;
        $tenagakerja->total_gaji = $totalgaji;
        $tenagakerja->save();

        return redirect('/datatenagakerja')->with('update', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $tenagakerja = TenagaKerja::find($id);
        $tenagakerja->delete();

        return redirect('/datatenagakerja')->with('delete', 'Data Berhasil Dihapus');
    }
}