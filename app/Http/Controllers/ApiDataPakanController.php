<?php

namespace App\Http\Controllers;

use App\Models\DetailPakan;
use Illuminate\Http\Request;

class ApiDataPakanController extends Controller
{
    public function create(Request $request)
    {
        $data =  $request->validate([
            'pembelian' => 'required',
            'jenis_pakan' => 'required',
            'stok_pakan' => 'required',
            'harga_kg' => 'required',
        ]);

        $total_harga = $data['setok_pakan'] * $data['harga_kg'];

        $datapakan = DetailPakan::create([
            'pembelian' => $data['pembelian'],
            'jenis_pakan' => $data['jenis_pakan'],
            'stok_pakan' => $data['stok_pakan'],
            'harga_kg' => $data['harga_kg'],
            'total_harga' => $total_harga,
        ]);

        return response()->json([
            'message' => "success",
            'datapakan' => $datapakan
        ]);
    }

    public function read()
    {
        $datapakan = DetailPakan::orderByDesc('id')->get();

        return response()->json([
            'message' => "success",
            'datapakan' => $datapakan
        ]);
    }

    public function update(Request $request, $id)
    {
        $data =  $request->validate([
            'pembelian' => 'required',
            'jenis_pakan' => 'required',
            'stok_pakan' => 'required',
            'harga_kg' => 'required',
        ]);

        $datapakan = DetailPakan::findOrFail($id);

        $total_harga = $data['setok_pakan'] * $data['harga_kg'];

        $datapakan->update([
            'pembelian' => $data['pembelian'],
            'jenis_pakan' => $data['jenis_pakan'],
            'stok_pakan' => $data['stok_pakan'],
            'harga_kg' => $data['harga_kg'],
            'total_harga' => $total_harga,
        ]);

        return response()->json([
            'message' => "success",
            'datapakan' => $datapakan
        ]);
    }

    public function delete($id)
    {

        $datapakan = DetailPakan::findOrFail($id);

        return response()->json([
            'message' => "success",
            'datapakan' => $datapakan
        ]);
    }
}
