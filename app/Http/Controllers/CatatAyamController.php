<?php

namespace App\Http\Controllers;

use App\Models\CatatAyam;
use Illuminate\Http\Request;

class CatatAyamController extends Controller
{
    public function index()
    {
        $catatayam = CatatAyam::all();
        return view('admin.pages.dataayam', [
            'dataayam' => $catatayam,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ayam' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'mati' => 'required',


        ], [
                'id_ayam.required' => 'ID Ayam tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
            ]);

        CatatAyam::create([
            'id_ayam' => $request->id_ayam,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'mati' => $request->mati,
        ]);

        return redirect('/dataayam')->with('success', 'Data Berhasil Ditambahkan');

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'id_ayam' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'mati' => 'required',
        ], [
                'id_ayam.required' => 'ID Ayam tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
            ]);

        CatatAyam::where('id', $id)
            ->update([
                'id_ayam' => $request->id_ayam,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'mati' => $request->mati,
            ]);

        return redirect('/dataayam')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        CatatAyam::destroy($id);
        return redirect('/dataayam')->with('success', 'Data Berhasil Dihapus');
    }

}