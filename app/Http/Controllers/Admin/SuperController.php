<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SuperController extends Controller
{
    public function superadmin(){
        $query = User::all();
        return view('admin.superadmin.index', compact('query'));
    }

    // Tambah
    public function add_superadmin(){
        return view('admin.superadmin.add');
    }

    public function add_superadmin_aksi(Request $request){
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        $query = User::create($data);
        if($query){
            return redirect()->route('admin_superadmin')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect()->route('admin_superadmin')->with('failed', 'Data gagal ditambahkan');
        }
    }

    // Edit
    public function edit_superadmin(Request $request){
        $data = $request->all();
        $superadmin = User::where('id', $data['id'])->first();
        return view('admin.superadmin.edit', compact('superadmin'));
    }

    public function edit_superadmin_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        if(isset($data['password'])){
            $data['password'] = \Hash::make($data['password']);
        }
        $query = User::where('id', $data['id'])->update($data);
        if($query){
            return redirect()->route('admin_superadmin')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('admin_superadmin')->with('failed', 'Data gagal diubah');
        }
    }

    // Hapus
    public function delete_superadmin_aksi(Request $request){
        $data = $request->all();
        if($data['id'] == \Auth::user()->id){
            return redirect()->route('admin_superadmin')->with('failed', 'Tidak dapat menghapus diri sendiri');
        }
        $query = User::where('id', $data['id'])->delete();
        if($query){
            return redirect()->route('admin_superadmin')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('admin_superadmin')->with('failed', 'Data gagal dihapus');
        }
    }
}
