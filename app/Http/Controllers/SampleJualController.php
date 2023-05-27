<?php

namespace App\Http\Controllers;

use App\Models\SampleJual;
use Illuminate\Http\Request;

class SampleJualController extends Controller
{
    public function index()
    {
        $samplejual = SampleJual::all();
        return view('admin.pages.datajual', [
            'samplejual' => $samplejual,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'jumlah_jual' => 'required',
        ], [
                'id_user.required' => 'ID User tidak boleh kosong',
                'jumlah_jual.required' => 'Jumlah Jual tidak boleh kosong',
            ]);

        SampleJual::create([
            'id_user' => $request->id_user,
            'jumlah_jual' => $request->jumlah_jual,
        ]);

        return redirect('/datasamplejual')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'id_user' => 'required',
            'jumlah_jual' => 'required',
        ], [
                'id_user.required' => 'ID User tidak boleh kosong',
                'jumlah_jual.required' => 'Jumlah Jual tidak boleh kosong',
            ]);

        SampleJual::where('id', $id)
            ->update([
                'id_user' => $request->id_user,
                'jumlah_jual' => $request->jumlah_jual,
            ]);

        return redirect('/datasamplejual')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        SampleJual::destroy($id);
        return redirect('/datasamplejual')->with('success', 'Data Berhasil Dihapus');
    }
}