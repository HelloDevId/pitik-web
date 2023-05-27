<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index()
    {
        $distribusi = Distribusi::all();
        return view('admin.pages.datadistribusi', [
            'distribusi' => $distribusi,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'tanggal' => 'required',
            'contact' => 'required',
            'harga_satuan' => 'required',
            'payment' => 'required',
            'address' => 'required',

        ], [
                'customer.required' => 'Customer tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'contact.required' => 'Contact tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                'payment.required' => 'Payment tidak boleh kosong',
                'address.required' => 'Address tidak boleh kosong',
            ]);

        Distribusi::create([
            'customer' => $request->customer,
            'tanggal' => $request->tanggal,
            'contact' => $request->contact,
            'harga_satuan' => $request->harga_satuan,
            'payment' => $request->payment,
            'address' => $request->address,
        ]);

        return redirect('/datadistribusi')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'customer' => 'required',
            'tanggal' => 'required',
            'contact' => 'required',
            'harga_satuan' => 'required',
            'payment' => 'required',
            'address' => 'required',
        ], [
                'customer.required' => 'Customer tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'contact.required' => 'Contact tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
                'payment.required' => 'Payment tidak boleh kosong',
                'address.required' => 'Address tidak boleh kosong',
            ]);

        Distribusi::where('id', $id)
            ->update([
                'customer' => $request->customer,
                'tanggal' => $request->tanggal,
                'contact' => $request->contact,
                'harga_satuan' => $request->harga_satuan,
                'payment' => $request->payment,
                'address' => $request->address,
            ]);

        return redirect('/datadistribusi')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        Distribusi::destroy($id);
        return redirect('/datadistribusi')->with('success', 'Data Berhasil Dihapus');
    }
}