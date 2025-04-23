<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterKepengurusan;

class KepengurusanController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function kepengurusan(){
        $kepengurusan = MasterKepengurusan::all();
        return view('admin.kepengurusan.index', compact('kepengurusan'));
    }

    public function add_kepengurusan(){
        return view('admin.kepengurusan.add');
    }

    public function edit_kepengurusan(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $kepengurusan = MasterKepengurusan::findOrFail($id);
        if($kepengurusan){
            return view('admin.kepengurusan.edit', compact('kepengurusan'));
        }else{
            return redirect()->route('admin_kepengurusan')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_kepengurusan_aksi(Request $request){
        $data = $request->all();
        // Gambar
        $image = request()->file('img');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('uploads/kepengurusan'), $filename);
        $data['img'] = $filename;
        \DB::beginTransaction();
        try{
            $query = MasterKepengurusan::create($data);
            \DB::commit();
            return redirect()->route('admin_kepengurusan')->with('success', 'Kepengurusan berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_kepengurusan')->with('error', $e->getMessage());
        }
    }

    public function edit_kepengurusan_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterKepengurusan::where('id', $data['id'])->first();
            if(request()->file('img')){
                $image = request()->file('img');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('uploads/kepengurusan'), $filename);
                $data['img'] = $filename;
                // Hapus gambar lama
                if(is_file(public_path('uploads/kepengurusan/'.$query->img)) && $query->img !== $filename){
                    unlink(public_path('uploads/kepengurusan/'.$query->img));
                }
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('admin_kepengurusan')->with('success', 'Kepengurusan berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_kepengurusan')->with('error', $e->getMessage());
        }
    }

    public function delete_kepengurusan_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterKepengurusan::where('id', $id)->first();
            $query->delete();
            \DB::commit();
            // Hapus gambar
            if(is_file(public_path('uploads/kepengurusan/'.$query->img))){
                unlink(public_path('uploads/kepengurusan/'.$query->img));
            }
            return redirect()->route('admin_kepengurusan')->with('success', 'Data kepengurusan berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_kepengurusan')->with('error', $e->getMessage());
        }
    }

}
