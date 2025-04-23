<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterVisi;

class VisiController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function add_visi(){
        $id = 1;
        $visi = MasterVisi::findOrFail($id);
        if($visi){
            return view('admin.beranda.visi.add', compact('visi'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit_visi(){
        $id = 1;
        $visi = MasterVisi::findOrFail($id);
        if($visi){
            return view('admin.beranda.visi.edit', compact('visi'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function simpan_visi_aksi(Request $request){
        $id = 1;
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterVisi::where('id', $id)->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
