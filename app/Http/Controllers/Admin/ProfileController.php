<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterProfile;

class ProfileController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function add_profile(){
        $id = 1;
        $profile = MasterProfile::findOrFail($id);
        if($profile){
            return view('admin.beranda.profile.add', compact('profile'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit_profile(){
        $id = 1;
        $profile = MasterProfile::findOrFail($id);
        if($profile){
            return view('admin.beranda.profile.edit', compact('profile'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function simpan_profile_aksi(Request $request){
        $id = 1;
        $data = $request->all();
        \DB::beginTransaction();
        try{
            $query = MasterProfile::where('id', $id)->first();
            if(request()->file('img')){
                $image = request()->file('img');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('uploads/profile'), $filename);
                $data['img'] = $filename;
                // Hapus gambar lama
                if(is_file(public_path('uploads/profile/'.$query->img)) && $query->img !== 'image1.png'){
                    unlink(public_path('uploads/profile/'.$query->img));
                }
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
