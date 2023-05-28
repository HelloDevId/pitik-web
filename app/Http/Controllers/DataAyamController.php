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
            'ayam' => $dataayam,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'harga_satuan' => 'required',
            // 'total_harga' => 'required',
            'mati' => 'required',
            // 'total_ayam' => 'required',

        ], [
                'tanggal_masuk.required' => 'Tanggal tidak boleh kosong',
                'jumlah_masuk.required' => 'Jumlah Masuk tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                // 'total_harga.required' => 'Total Harga tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
                // 'total_ayam.required' => 'Total Ayam tidak boleh kosong',
            ]);

        DataAyam::create([

            $total_harga = $request->jumlah_masuk * $request->harga_satuan,
            $total_ayam = $request->jumlah_masuk - $request->mati,

            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah_masuk' => $request->jumlah_masuk,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total_harga,
            'mati' => $request->mati,
            'total_ayam' => $total_ayam,
        ]);

        return redirect('/dataayam')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal_masuk' => 'required',
            'jumlah_masuk' => 'required',
            'harga_satuan' => 'required',
            // 'total_harga' => 'required',
            'mati' => 'required',
            // 'total_ayam' => 'required',
        ], [
                'tanggal_masuk.required' => 'Tanggal tidak boleh kosong',
                'jumlah_masuk.required' => 'Jumlah Masuk tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                // 'total_harga.required' => 'Total Harga tidak boleh kosong',
                'mati.required' => 'Mati tidak boleh kosong',
                // 'total_ayam.required' => 'Total Ayam tidak boleh kosong',
            ]);

        $total_harga = $request->jumlah_masuk * $request->harga_satuan;
        $total_ayam = $request->jumlah_masuk - $request->mati;

        DataAyam::where('id', $id)
            ->update([

                'tanggal_masuk' => $request->tanggal_masuk,
                'jumlah_masuk' => $request->jumlah_masuk,
                'harga_satuan' => $request->harga_satuan,
                'total_harga' => $total_harga,
                'mati' => $request->mati,
                'total_ayam' => $total_ayam,
            ]);

        return redirect('/dataayam')->with('update', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        DataAyam::destroy($id);
        return redirect('/dataayam')->with('delete', 'Data Berhasil Dihapus');
    }
}