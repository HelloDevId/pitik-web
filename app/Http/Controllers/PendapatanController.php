<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index()
    {
        Pendapatan::all();

        return view('admin.pages.datapendapatan', [
            'pendapatan' => Pendapatan::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
            'pendapatan' => 'required',
        ], [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'pemasukan.required' => 'Pemasukan tidak boleh kosong',
                'pengeluaran.required' => 'Pengeluaran tidak boleh kosong',
                'pendapatan.required' => 'Pendapatan tidak boleh kosong',
            ]);

        $pendapatan = $request->pemasukan - $request->pengeluaran;

        Pendapatan::create([
            'tanggal' => $request->tanggal,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran,
            'pendapatan' => $pendapatan,
        ]);

        return redirect('/datapendapatan')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
            'pendapatan' => 'required',
        ], [
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'pemasukan.required' => 'Pemasukan tidak boleh kosong',
                'pengeluaran.required' => 'Pengeluaran tidak boleh kosong',
                'pendapatan.required' => 'Pendapatan tidak boleh kosong',
            ]);

        $total_pendapatan = $request->pemasukan - $request->pengeluaran;

        $pendapatan = Pendapatan::find($id);
        $pendapatan->tanggal = $request->tanggal;
        $pendapatan->pemasukan = $request->pemasukan;
        $pendapatan->pengeluaran = $request->pengeluaran;
        $pendapatan->pendapatan = $total_pendapatan;
        $pendapatan->save();

        return redirect('/datapendapatan')->with('update', 'Data Berhasil Diubah');

    }

    public function destroy($id)
    {
        $pendapatan = Pendapatan::find($id);
        $pendapatan->delete();

        return redirect('/datapendapatan')->with('delete', 'Data Berhasil Dihapus');
    }
}