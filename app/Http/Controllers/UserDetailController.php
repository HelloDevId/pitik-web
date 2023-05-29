<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        $userdetail = User::where('id_level', '2')->get();
        return view('admin.pages.datauser', [
            'userdetail' => $userdetail,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user_detail,email',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
            'user_fullname' => 'required',
        ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 8 karakter',
                'repassword.required' => 'Konfirmasi password tidak boleh kosong',
                'repassword.same' => 'Konfirmasi password tidak sama',
                'user_fullname.required' => 'Nama tidak boleh kosong',
            ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_fullname' => $request->user_fullname,
            'id_level' => '2',
        ]);

        return redirect('/datauser')->with('create', 'Data user berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        if ($request->password == null) {

            $request->validate([
                'email' => 'required|email|unique:user_detail,email,' . $id,
                // 'password' => 'required|min:8',
                // 'repassword' => 'required|same:password',
                'user_fullname' => 'required',
            ], [
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah terdaftar',
                    // 'password.required' => 'Password tidak boleh kosong',
                    // 'password.min' => 'Password minimal 8 karakter',
                    // 'repassword.required' => 'Konfirmasi password tidak boleh kosong',
                    // 'repassword.same' => 'Konfirmasi password tidak sama',
                    'user_fullname.required' => 'Nama tidak boleh kosong',
                ]);

            User::where('id', $id)->update([
                'email' => $request->email,
                // 'password' => bcrypt($request->password),
                'user_fullname' => $request->user_fullname,
                'id_level' => '2',
            ]);

            return redirect('/datauser')->with('update', 'Data user berhasil diubah!');

        } else {

            $request->validate([
                'email' => 'required|email|unique:user_detail,email,' . $id,
                'password' => 'required|min:8',
                'repassword' => 'required|same:password',
                'user_fullname' => 'required',
            ], [
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah terdaftar',
                    'password.required' => 'Password tidak boleh kosong',
                    'password.min' => 'Password minimal 8 karakter',
                    'repassword.required' => 'Konfirmasi password tidak boleh kosong',
                    'repassword.same' => 'Konfirmasi password tidak sama',
                    'user_fullname.required' => 'Nama tidak boleh kosong',
                ]);

            User::where('id', $id)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_fullname' => $request->user_fullname,
                'id_level' => '2',
            ]);

            return redirect('/datauser')->with('update', 'Data user berhasil diubah!');
        }


    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/datauser')->with('delete', 'Data user berhasil dihapus!');
    }
}