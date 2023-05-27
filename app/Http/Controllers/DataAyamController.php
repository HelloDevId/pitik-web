<?php

namespace App\Http\Controllers;

use App\Models\DataAyam;
use Illuminate\Http\Request;

class DataAyamController extends Controller
{
    public function index()
    {
        $dataayam = DataAyam::all();
        return view('admin.pages.dataayam', [
            'dataayam' => $dataayam,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'harga_satuan' => 'required',
            'total_harga' => 'required',
            'mati' => 'required',
            'total_ayam' => 'required',

        ], [
                'tanggal_masuk.required' => 'Tanggal tidak boleh kosong',
                'jumlah_masuk.required' => 'Jumlah Masuk tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                'total_harga.required' => 'Total Harga tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
                'total_ayam.required' => 'Total Ayam tidak boleh kosong',
            ]);

        DataAyam::create([
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah_masuk' => $request->jumlah_masuk,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $request->total_harga,
            'mati' => $request->mati,
            'total_ayam' => $request->total_ayam,
        ]);

        return redirect('/dataayam')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'harga_satuan' => 'required',
            'total_harga' => 'required',
            'mati' => 'required',
            'total_ayam' => 'required',
        ], [
                'tanggal_masuk.required' => 'Tanggal tidak boleh kosong',
                'jumlah_masuk.required' => 'Jumlah Masuk tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                'total_harga.required' => 'Total Harga tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
                'total_ayam.required' => 'Total Ayam tidak boleh kosong',
            ]);

        DataAyam::where('id', $id)
            ->update([
                'tanggal_masuk' => $request->tanggal_masuk,
                'jumlah_masuk' => $request->jumlah_masuk,
                'harga_satuan' => $request->harga_satuan,
                'total_harga' => $request->total_harga,
                'mati' => $request->mati,
                'total_ayam' => $request->total_ayam,
            ]);

        return redirect('/dataayam')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        DataAyam::destroy($id);
        return redirect('/dataayam')->with('success', 'Data Berhasil Dihapus');
    }
}