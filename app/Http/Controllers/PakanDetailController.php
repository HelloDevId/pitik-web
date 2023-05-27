<?php

namespace App\Http\Controllers;

use App\Models\DetailPakan;
use Illuminate\Http\Request;

class PakanDetailController extends Controller
{
    public function index()
    {
        $pakandetail = DetailPakan::all();
        return view('admin.pages.datapakandetail', [
            'pakandetail' => $pakandetail,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembelian' => 'required',
            'jenis_pakan' => 'required',
            'stok_pakan' => 'required',
            'harga_kg' => 'required',
            'total_harga' => 'required',

        ], [
                'pembelian.required' => 'Pembelian tidak boleh kosong',
                'jenis_pakan.required' => 'Jenis Pakan tidak boleh kosong',
                'stok_pakan.required' => 'Stok Pakan tidak boleh kosong',
                'harga_kg.required' => 'Harga per Kg tidak boleh kosong',
                'total_harga.required' => 'Total Harga tidak boleh kosong',


            ]);

        DetailPakan::create([
            'pembelian' => $request->pembelian,
            'jenis_pakan' => $request->jenis_pakan,
            'stok_pakan' => $request->stok_pakan,
            'harga_kg' => $request->harga_kg,
            'total_harga' => $request->total_harga,

        ]);

        return redirect('/datapakandetail')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'pembelian' => 'required',
            'jenis_pakan' => 'required',
            'stok_pakan' => 'required',
            'harga_kg' => 'required',
            'total_harga' => 'required',

        ], [
                'pembelian.required' => 'Pembelian tidak boleh kosong',
                'jenis_pakan.required' => 'Jenis Pakan tidak boleh kosong',
                'stok_pakan.required' => 'Stok Pakan tidak boleh kosong',
                'harga_kg.required' => 'Harga per Kg tidak boleh kosong',
                'total_harga.required' => 'Total Harga tidak boleh kosong',
            ]);

        DetailPakan::where('id', $id)
            ->update([
                'pembelian' => $request->pembelian,
                'jenis_pakan' => $request->jenis_pakan,
                'stok_pakan' => $request->stok_pakan,
                'harga_kg' => $request->harga_kg,
                'total_harga' => $request->total_harga,
            ]);

        return redirect('/datapakandetail')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {
        DetailPakan::destroy($id);
        return redirect('/datapakandetail')->with('success', 'Data Berhasil Dihapus');
    }
}