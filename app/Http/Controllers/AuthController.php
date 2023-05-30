<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            $userLogin = $user->id_level;
        }

        if ($userLogin == 1) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/index')->with('loginberhasil', 'login berhasil');
            } else {
                return redirect()->intended('/login')->with('loginerror', 'login error');
            }
        } elseif ($userLogin == 2) {

            return redirect()->intended('/login')->with('bukanadmin', 'login error');
        } elseif ($userLogin == 3) {

            return redirect()->intended('/login')->with('failed', 'login error');
        }
    }

    public function profilupdate(Request $request, $id)
    {
        if ($request->oldpassword == null) {
            $request->validate(
                [
                    'user_fullname' => 'required',
                    'email' => 'required|email|unique:user_detail,email,' . $id,
                ],
                [
                    'user_fullname.required' => 'name tidak boleh kosong',
                    'email.email' => 'email tidak valid',
                    'email.required' => 'email tidak boleh kosong',
                    'email.unique' => 'email sudah terdaftar',
                ]
            );
            $user = User::find($id);
            $user->user_fullname = $request->user_fullname;
            $user->email = $request->email;
            $user->save();
            return redirect()->intended('/index')->with('updateprofil', 'berhasil update profil');
        } else {

            $request->validate(
                [
                    'user_fullname' => 'required',
                    'email' => 'required|email|unique:user_detail,email,' . $id,
                    'oldpassword' => 'required',
                    'password' => 'required|min:8',
                    'repassword' => 'required|same:password',
                ],
                [
                    'user_fullname.required' => 'name tidak boleh kosong',
                    'email.required' => 'email tidak boleh kosong',
                    'email.email' => 'email tidak valid',
                    'email.unique' => 'email sudah terdaftar',
                    'oldpassword.required' => 'oldpassword tidak boleh kosong',
                    'password.min' => 'password minimal 8 karakter',
                    'password.required' => 'password tidak boleh kosong',
                    'repassword.required' => 'repassword tidak boleh kosong',
                    'repassword.same' => 'repassword tidak sama dengan password',
                ]
            );

            if (Hash::check($request->oldpassword, Auth::user()->password)) {

                if ($request->password == $request->repassword) {

                    $user = User::find($id);
                    $user->user_fullname = $request->user_fullname;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return redirect()->intended('/index')->with('updateprofil', 'berhasil update profil');
                } else {

                    return redirect()->intended('/index')->with('passwordtidaksama', 'gagal update profil');
                }
            } else {

                return redirect()->intended('/index')->with('updateprofilerror', 'gagal update profil');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/login')->with('logout', 'berhasil logout');
    }
}