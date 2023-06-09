<?php

namespace App\Http\Controllers;

use App\Models\VaksinDetail;
use Illuminate\Http\Request;

class VaksinDetailController extends Controller
{
    public function index()
    {
        $vaksin = VaksinDetail::all();
        return view('admin.pages.dataovk', [
            'vaksin' => $vaksin,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_ovk' => 'required',
            'jenis_ovk' => 'required',
            'jumlah_ayam' => 'required',
            'next_ovk' => 'required',
            'biaya_ovk' => 'required',
            // 'total_biaya' => 'required',

        ], [
                'tanggal_ovk.required' => 'Tanggal tidak boleh kosong',
                'jenis_ovk.required' => 'Jenis OVK tidak boleh kosong',
                'jumlah_ayam.required' => 'Jumlah Ayam tidak boleh kosong',
                'next_ovk.required' => 'Next OVK tidak boleh kosong',
                'biaya_ovk.required' => 'Biaya OVK tidak boleh kosong',
                // 'total_biaya.required' => 'Total Biaya tidak boleh kosong',

            ]);

        $biayaovk = $request->jumlah_ayam * $request->biaya_ovk;

        VaksinDetail::create([
            'tanggal_ovk' => $request->tanggal_ovk,
            'jenis_ovk' => $request->jenis_ovk,
            'jumlah_ayam' => $request->jumlah_ayam,
            'next_ovk' => $request->next_ovk,
            'biaya_ovk' => $request->biaya_ovk,
            'total_biaya' => $biayaovk,
        ]);

        return redirect('/dataovk')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal_ovk' => 'required',
            'jenis_ovk' => 'required',
            'jumlah_ayam' => 'required',
            'next_ovk' => 'required',
            'biaya_ovk' => 'required',
            // 'total_biaya' => 'required',

        ], [
                'tanggal_ovk.required' => 'Tanggal tidak boleh kosong',
                'jenis_ovk.required' => 'Jenis OVK tidak boleh kosong',
                'jumlah_ayam.required' => 'Jumlah Ayam tidak boleh kosong',
                'next_ovk.required' => 'Next OVK tidak boleh kosong',
                'biaya_ovk.required' => 'Biaya OVK tidak boleh kosong',
                // 'total_biaya.required' => 'Total Biaya tidak boleh kosong',

            ]);

        $biayaovk = $request->jumlah_ayam * $request->biaya_ovk;

        $vaksin = VaksinDetail::find($id);
        $vaksin->tanggal_ovk = $request->tanggal_ovk;
        $vaksin->jenis_ovk = $request->jenis_ovk;
        $vaksin->jumlah_ayam = $request->jumlah_ayam;
        $vaksin->next_ovk = $request->next_ovk;
        $vaksin->biaya_ovk = $request->biaya_ovk;
        $vaksin->total_biaya = $biayaovk;
        $vaksin->save();

        return redirect('/dataovk')->with('update', 'Data Berhasil Diubah');


    }

    public function destroy($id)
    {
        $vaksin = VaksinDetail::find($id);
        $vaksin->delete();

        return redirect('/dataovk')->with('delete', 'Data Berhasil Dihapus');
    }

}