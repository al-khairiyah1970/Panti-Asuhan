<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterAnak;
use App\Models\MasterGambarAnak;

class AnakAsuhController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    // Anak Asuh
    public function anak(){
        $anak = MasterAnak::orderBy('created_at', 'desc')->get();
        $gambar = MasterGambarAnak::orderBy('created_at', 'asc')->get();
        return view('admin.anak.index', compact('anak', 'gambar'));
    }

    public function add_anak(){
        return view('admin.anak.add');
    }

    public function edit_anak(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $anak = MasterAnak::findOrFail($id);
        if($anak){
            return view('admin.anak.edit', compact('anak'));
        }else{
            return redirect()->route('admin_anak')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_anak_aksi(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try{
            $query = MasterAnak::create($data);
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data anak asuh berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

    public function edit_anak_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterAnak::where('id', $data['id'])->update($data);
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data anak asuh berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

    public function delete_anak_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterAnak::where('id', $id)->delete();
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data anak asuh berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

    // Gambar Anak Asuh
    public function add_gambar_anak(){
        return view('admin.anak.gambar.add');
    }

    public function edit_gambar_anak(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $gambar = MasterGambarAnak::findOrFail($id);
        if($gambar){
            return view('admin.anak.gambar.edit', compact('gambar'));
        }else{
            return redirect()->route('admin_anak')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_gambar_anak_aksi(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try{
            // Cek ada gambar atau tidak
            if($request->file('file')){
                $file = $request->file('file');
                $filename = time().'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/anak'), $filename);
                $data['file'] = $filename;
            }
            $query = MasterGambarAnak::create($data);
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data gambar anak asuh berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

    public function edit_gambar_anak_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        \DB::beginTransaction();
        try{
            $query = MasterGambarAnak::where('id', $data['id'])->first();
            // Cek ada gambar atau tidak
            if($request->file('file')){
                if(is_file(public_path('uploads/anak/'.$query['file']))){
                    unlink(public_path('uploads/anak/'.$query['file']));
                }
                $file = $request->file('file');
                $filename = time().'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/anak'), $filename);
                $data['file'] = $filename;
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data gambar anak asuh berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

    public function delete_gambar_anak_aksi($id){
        \DB::beginTransaction();
        try{
            $query = MasterGambarAnak::where('id', $id)->first();
            if($query['file'] && is_file(public_path('uploads/anak/'.$query['file']))){
                unlink(public_path('uploads/anak/'.$query['file']));
            }
            $query->delete();
            \DB::commit();
            return redirect()->route('admin_anak')->with('success', 'Data gambar anak asuh berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_anak')->with('error', $e->getMessage());
        }
    }

}
