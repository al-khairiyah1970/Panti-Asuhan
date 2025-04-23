<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            if(Auth::user()->role == 'SA'){
                return redirect()->route('admin_superadmin');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return view('login.index');
        }
    }

    public function login_aksi(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = $request->all();
        $cred = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        // Cek remember me
        $remember = false;
        if(isset($data['remember_me']) && $data['remember_me'] == 'on'){
            $remember = true;
        }
        // Attempt
        if(Auth::attempt($cred, $remember)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Username atau password salah');
        }
    }

    public function logout_aksi(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil keluar');
    }
}
