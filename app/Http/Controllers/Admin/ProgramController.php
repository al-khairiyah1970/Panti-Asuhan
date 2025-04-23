<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MasterProgram;

class ProgramController extends Controller
{
    public function __construct(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login dulu');
        }
    }

    public function program(){
        $mingguan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'mingguan')->get();
        $bulanan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'bulanan')->get();
        $tahunan = MasterProgram::orderBy('created_at', 'desc')->where('jenis', 'tahunan')->get();
        return view('admin.program.index', compact('mingguan', 'bulanan', 'tahunan'));
    }

    // Add
    public function add_program(Request $request){
        $data = $request->all();
        $jenis = $data['jenis'];
        return view('admin.program.'.$jenis.'.add');
    }

    // Edit
    public function edit_program(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $jenis = $data['jenis'];
        $program = MasterProgram::where('id', $id)->where('jenis', $jenis)->first();
        if($program){
            return view('admin.program.'.$jenis.'.edit', compact('program'));
        }else{
            return redirect()->route('admin_program')->with('error', 'Data tidak ditemukan');
        }
    }

    // Aksi
    public function add_program_aksi(Request $request){
        $data = $request->all();
        // Gambar
        $image = request()->file('img');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('uploads/program/'.$data['jenis'].''), $filename);
        $data['img'] = $filename;
        \DB::beginTransaction();
        try{
            $query = MasterProgram::create($data);
            \DB::commit();
            return redirect()->route('admin_program')->with('success', 'Program berhasil ditambahkan');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_program')->with('error', $e->getMessage());
        }
    }

    public function edit_program_aksi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $id = $data['id'];
        $jenis = $data['jenis'];
        \DB::beginTransaction();
        try{
            $query = MasterProgram::where('id', $id)->where('jenis', $jenis)->first();
            if(request()->file('img')){
                $image = request()->file('img');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('uploads/program/'.$jenis.''), $filename);
                $data['img'] = $filename;
                // Hapus gambar lama
                if(is_file(public_path('uploads/program/'.$jenis.'/'.$query->img)) && $query->img !== $filename){
                    unlink(public_path('uploads/program/'.$jenis.'/'.$query->img));
                }
            }
            $query->update($data);
            \DB::commit();
            return redirect()->route('admin_program')->with('success', 'Banner berhasil diubah');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_program')->with('error', $e->getMessage());
        }
    }

    public function delete_program_aksi(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $jenis = $data['jenis'];
        \DB::beginTransaction();
        try{
            $query = MasterProgram::where('id', $id)->first();
            $query->delete();
            \DB::commit();
            // Hapus gambar
            if(is_file(public_path('uploads/program/'.$jenis.'/'.$query->img))){
                unlink(public_path('uploads/program/'.$jenis.'/'.$query->img));
            }
            return redirect()->route('admin_program')->with('success', 'Program berhasil dihapus');
        }catch(\Exception $e){
            \DB::rollBack();
            return redirect()->route('admin_program')->with('error', $e->getMessage());
        }
    }
}
