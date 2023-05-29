<?php

namespace App\Http\Controllers;

use App\Models\SampleJual;
use App\Models\User;
use Illuminate\Http\Request;

class SampleJualController extends Controller
{
    public function index()
    {
        $datauser = User::where('id_level', '2')->get();
        $samplejual = SampleJual::with('userdetail')->get();
        return view('admin.pages.datasamplejual', [
            'samplejual' => $samplejual,
            'datauser' => $datauser,
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

        return redirect('/datasamplejual')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'jumlah_jual' => 'required',
        ], [

                'jumlah_jual.required' => 'Jumlah Jual tidak boleh kosong',
            ]);

        SampleJual::where('id', $id)
            ->update([

                'jumlah_jual' => $request->jumlah_jual,
            ]);

        return redirect('/datasamplejual')->with('update', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        SampleJual::find($id)->delete();
        return redirect('/datasamplejual')->with('delete', 'Data Berhasil Dihapus');
    }
}