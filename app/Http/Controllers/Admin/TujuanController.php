<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterTujuan;

class TujuanController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function add_tujuan(){
        return view('admin.beranda.tujuan.add');
    }

    public function edit_tujuan(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $tujuan = MasterTujuan::findOrFail($id);
        if($tujuan){
            return view('admin.beranda.tujuan.edit', compact('tujuan'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_tujuan_aksi(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try{
            $query = MasterTujuan::create($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data tujuan berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function edit_tujuan_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterTujuan::where('id', $data['id'])->update($data);
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data tujuan berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    public function delete_tujuan_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterTujuan::where('id', $id)->delete();
            \DB::commit();
            return redirect()->route('dashboard')->with('success', 'Data tujuan berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }
}
