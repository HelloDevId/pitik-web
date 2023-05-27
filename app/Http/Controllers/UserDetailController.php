<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $userdetail = UserDetail::all();
        return view('admin.pages.datauserdetail', [
            'userdetail' => $userdetail,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user_detail,email',
            'password' => 'required|min:8',
            'user_fullname' => 'required',
        ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'user_fullname.required' => 'Nama tidak boleh kosong',
            ]);

        UserDetail::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_fullname' => $request->user_fullname,
            'id_level' => '2',
        ]);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:user_detail,email,' . $id,
            'password' => 'required|min:8',
            'user_fullname' => 'required',
        ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'user_fullname.required' => 'Nama tidak boleh kosong',
            ]);

        UserDetail::where('id', $id)->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_fullname' => $request->user_fullname,
            'id_level' => '2',
        ]);
    }

    public function destroy($id)
    {
        UserDetail::destroy($id);
    }
}