<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Siswa::where('Nama', 'LIKE', '%' .$request->search. '%')->get();
        } else {
            $data = Siswa::paginate(4);
        }

        return view('datasiswa', compact('data'));
    }

    public function tambahsiswa(){
        return view('tambahsiswa');
    }

    public function insertdatasiswa(Request $request){
        $data = Siswa::create($request->all());
        if($request->hasfile('PasFoto')){
            $request->file('PasFoto')->move('PasFoto/', $request->file('PasFoto')->getClientOriginalName());
            $data->PasFoto = $request->file('PasFoto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('siswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editsiswa($id){
        $data = Siswa::find($id);
        return view('editsiswa', compact('data'));
    }

    public function updatesiswa(Request $request, $id){
        $data = Siswa::find($id);
        
        // hapus foto lama dari folder
        if($data->PasFoto){
            $pathfoto = public_path('PasFoto/' . $data->PasFoto);

            if(file_exists($pathfoto)){
                unlink($pathfoto); // hapus foto jika ada
            }
        }

        $data->update($request->all());

        // menambah foto baru di folder\
        if($request->hasfile('PasFoto')){
            $request->file('PasFoto')->move('PasFoto/', $request->file('PasFoto')->getClientOriginalName());
            $data->PasFoto = $request->file('PasFoto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('siswa')->with('success', 'Data Berhasil Diperbarui');
    }

    public function deletesiswa($id){
        $data = Siswa::find($id);

        // hapus foto dari folder
        if($data->PasFoto){
            $pathfoto = public_path('PasFoto/' . $data->PasFoto);

            if(file_exists($pathfoto)){
                unlink($pathfoto); // hapus foto jika ada
            }
        }
        $data->delete();
        
        return redirect()->route('siswa')->with('success', 'Data Berhasil Dihapus');
    }
}
