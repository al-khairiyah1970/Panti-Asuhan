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

    public function lupa_password(){
        if(Auth::check()){
            if(Auth::user()->role == 'SA'){
                return redirect()->route('admin_superadmin');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return view('login.forgot');
        }
    }

    public function lupa_password_aksi(Request $request){
        $data = $request->all();
        $username = $data['username'];
        $find = User::where('username', $username)->first();
        if($find){
            $email = $find['email'];
            $name = $find['name'];
            $process = $this->email_lupa_password($name, $email, $username);
            if($process['status'] == true){
                return redirect()->route('login')->with('success', 'Email pemulihan password telah dikirim');
            }else{
                return redirect()->route('lupa_password')->with('error', $process['message']);
            }
        }else{
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }
    }

    public function email_lupa_password($nama, $email, $username){
        $subject = 'Notifikasi Lupa Kata Sandi';
        $title = 'Pengajuan lupa kata sandi Anda telah terverifikasi';
        $message = 'Berikut adalah link reset kata sandi Anda. Silakan klik tombol berikut untuk menuju ke halaman reset kata sandi.';
        $add = '<a href="'.url('/').'/ganti_password?username='.$username.'" target="_blank"><p style="font-size:14px; margin-bottom: 8rem; margin-top: 3rem; line-height:24px; text-align: center; font-weight: 500; padding-top:7px; padding-bottom:7px; border-radius:10px; background-color: #198754; color:#eaeaea">Klik Di Sini</p></a>';
        $logo = url('/').'/assets/logo.jpg';
        $html = '<!DOCTYPE html >
            <html lang="en">
              <body style="margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;background-color:rgb(255,255,255);font-family:ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;">
                <table align="center" role="presentation" cellSpacing="0" cellPadding="0" border="0" width="100%" style="max-width:37.5em;margin-left:auto;margin-right:auto;margin-top:40px;margin-bottom:40px;width:465px;border-radius:0.25rem;border-width:1px;border-style:solid;border-color:rgb(234,234,234);padding:20px">
                  <tr style="width:100%">
                  <td style="width: 10%;">
                      <img style=" width: 50px;" src="'.$logo.'" alt="">
                  </td>
                  <td style="border-left: 2px solid #000000 ;">
                      <h3 style="color: #198754; font-weight: 500; margin-left: 1rem;">Panti Asuhan Al - Khairiyah</h3>
                  </td>
                  </tr>
                  <tr>
                    <td align="center" colspan="2">
                      <p style="margin-top: 3rem; text-align: center; color: #000; font-size: 18px;">Halo, '.$nama.'</p>
                      <p style="margin: 0; font-size:25px; text-align: center; font-weight: 700; color: #198754;">'.$title.'</h2>
                      <img style="margin-top: 2rem; margin-bottom: 1rem;" src="https://i.imgur.com/dnbpKCf.png" alt="">
                    </td>
                  </tr>
                <tr align="center" >
                    <td colspan="3">
                      <p style="font-size:14px; style="width:90%" line-height:24px; text-align: center; color:rgb(0,0,0)">'.$message.'</p>
                      '.$add.'
                    </td>
                  </tr>
                  <tr>
                  <td align="center" colspan="2">
                    <a style="margin-left: 10px; margin-right: 10px;" href="https://www.instagram.com/" target="_blank" ><img style=" margin-top: 3rem; width: 36px; height: 36px;" src="https://i.imgur.com/ZALNeKx.png" alt=""></a>
                    <a style="margin-left: 10px; margin-right: 10px;" href=""https://www.facebook.com/" target="_blank" ><img style=" margin-top: 3rem; width: 36px; height: 36px;" src="https://i.imgur.com/F8zBT1s.png" alt=""></a>
                    <a style="margin-left: 10px; margin-right: 10px;" href="https://twitter.com/" target="_blank" ><img style=" margin-top: 3rem; width: 36px; height: 36px;" src="https://i.imgur.com/LqG7FNC.png" alt=""></a>
                  </td>
                </tr>
                <tr>
                <td colspan="2">
                    <hr style="width: 100%; border: none; border-top: 1px solid #eaeaea; margin: 26px 0; border-width: 1px; border-style: solid; border-color: rgb(234,234,234);">
                    <p style="margin: 0; text-align: center; color: #000; font-size: 12px;">Hak Cipta &copy; '.date('Y').'</p>
                    <h4 style="margin: 0; text-align: center; font-weight: 500; color: #000;">Panti Asuhan Al - Khairiyah</h4>
                    </td>
                </tr>
                </table>
              </body>

            </html>'
        ;
        $mailData = [
            'to' => $email,
            'content' => $html,
            'subject' => $subject
        ];
        $send = sendEmail($mailData);
        // if($send){
        //     return true;
        // } else {
        //     return false;
        // }
        return $send;
    }

    public function ganti_password(Request $request){
        $data = $request->all();
        $username = $data['username'];
        $find = User::where('username', $username)->first();
        if($find){
            return view('login.password', compact('find'));
        }else{
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }
    }

    public function ganti_password_aksi(Request $request){
        $data = $request->all();
        $username = $data['username'];
        $password = $data['password'];
        $find = User::where('username', $username)->first();
        if($find){
            $change = $find->update(['password' => \Hash::make($password)]);
            return redirect()->route('login')->with('success', 'Password berhasil diubah');
        }else{
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }
    }
}
