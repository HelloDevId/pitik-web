<?php

namespace App\Http\Controllers;

use App\Models\CatatAyam;
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

        $cekdata = DataAyam::all()->last();

        CatatAyam::create([
            'id_ayam' => $cekdata->id,
            'tanggal' => $request->tanggal_masuk,
            'jumlah' => $request->jumlah_masuk,
            'mati' => $request->mati,
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

        $updatecatatayam = CatatAyam::where('id_ayam', $id)->first();
        CatatAyam::where('id', $updatecatatayam->id)
            ->update([
                'tanggal' => $request->tanggal_masuk,
                'jumlah' => $request->jumlah_masuk,
                'mati' => $request->mati,
            ]);

        return redirect('/dataayam')->with('update', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $cekcatatayam = CatatAyam::where('id_ayam', $id)->first();
        if ($cekcatatayam) {
            CatatAyam::find($cekcatatayam->id)->delete();
            DataAyam::find($id)->delete();
            return redirect('/dataayam')->with('delete', 'Data Berhasil Dihapus');
        } else {
            DataAyam::find($id)->delete();
            return redirect('/dataayam')->with('delete', 'Data Berhasil Dihapus');
        }
    }
}