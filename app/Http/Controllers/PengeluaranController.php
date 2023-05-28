<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::all();

        return view('admin.pages.datapengeluaran', [
            'pengeluaran' => $pengeluaran,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'harga_pakan' => 'required',
            'tgl_beli_pakan' => 'required',
            'biaya_vaksin' => 'required',
            'tgl_vaksin' => 'required',
            'tenaga_kerja' => 'required',
            'bibit_ayam' => 'required',

        ], [
                'harga_pakan.required' => 'Harga Pakan tidak boleh kosong',
                'tgl_beli_pakan.required' => 'Tanggal Beli Pakan tidak boleh kosong',
                'biaya_vaksin.required' => 'Biaya Vaksin tidak boleh kosong',
                'tgl_vaksin.required' => 'Tanggal Vaksin tidak boleh kosong',
                'tenaga_kerja.required' => 'Tenaga Kerja tidak boleh kosong',
                'bibit_ayam.required' => 'Bibit Ayam tidak boleh kosong',

            ]);

        Pengeluaran::create([
            'harga_pakan' => $request->harga_pakan,
            'tgl_beli_pakan' => $request->tgl_beli_pakan,
            'biaya_vaksin' => $request->biaya_vaksin,
            'tgl_vaksin' => $request->tgl_vaksin,
            'tenaga_kerja' => $request->tenaga_kerja,
            'bibit_ayam' => $request->bibit_ayam,

        ]);

        return redirect('/datapengeluaran')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'harga_pakan' => 'required',
            'tgl_beli_pakan' => 'required',
            'biaya_vaksin' => 'required',
            'tgl_vaksin' => 'required',
            'tenaga_kerja' => 'required',
            'bibit_ayam' => 'required',

        ], [
                'harga_pakan.required' => 'Harga Pakan tidak boleh kosong',
                'tgl_beli_pakan.required' => 'Tanggal Beli Pakan tidak boleh kosong',
                'biaya_vaksin.required' => 'Biaya Vaksin tidak boleh kosong',
                'tgl_vaksin.required' => 'Tanggal Vaksin tidak boleh kosong',
                'tenaga_kerja.required' => 'Tenaga Kerja tidak boleh kosong',
                'bibit_ayam.required' => 'Bibit Ayam tidak boleh kosong',

            ]);

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->harga_pakan = $request->harga_pakan;
        $pengeluaran->tgl_beli_pakan = $request->tgl_beli_pakan;
        $pengeluaran->biaya_vaksin = $request->biaya_vaksin;
        $pengeluaran->tgl_vaksin = $request->tgl_vaksin;
        $pengeluaran->tenaga_kerja = $request->tenaga_kerja;
        $pengeluaran->bibit_ayam = $request->bibit_ayam;

        $pengeluaran->save();

        return redirect('/datapengeluaran')->with('update', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return redirect('/datapengeluaran')->with('delete', 'Data Berhasil Dihapus');
    }
}