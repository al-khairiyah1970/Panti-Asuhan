<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterMisi;

class MisiController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function add_misi(){
        return view('admin.beranda.misi.add');
    }

    public function edit_misi(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $misi = MasterMisi::findOrFail($id);
        if($misi){
            return view('admin.beranda.misi.edit', compact('misi'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_misi_aksi(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try{
            $query = MasterMisi::create($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data misi berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function edit_misi_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterMisi::where('id', $data['id'])->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data misi berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function delete_misi_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterMisi::where('id', $id)->delete();
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data misi berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
