<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $kredensial = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($kredensial)) {
            $role = auth()->user()->role;
            if ($role == "p3b3k") {
                return redirect()->route('dashboard.p3b3k');
            } elseif ($role == "desa") {
                return redirect()->route('dashboard.desa');
            } elseif ($role == "pelanggan") {
                return redirect()->route('dashboard.pelanggan');
            } else {
                return redirect()->route('dashboard.petugas');
            }
            Alert::toast('success', 'Berhasil Masuk');
        }
        Alert::toast('Username atau Password salah', 'error');
        return back()->with('status', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('login');
    }
}
