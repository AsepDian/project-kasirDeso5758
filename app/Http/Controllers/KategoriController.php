<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    //Menampilkan Data
    public function index(){
        $data = Kategori::all();
        return view('admin.kategori.dataKategori')
        ->with([
            'kategori' => $data,
            'tombol' => 'Simpan',
            'action' => url('addKategori')
            ]);
    }

    //Tambah Data
    public function add(){
        Kategori::create([
            'nama_kategori' => request()->nama_kategori,
        ]);
        return redirect('dataKategori');
    }

    //Edit Data
    public function edit($id){
        $kategori = Kategori::all();
        $baris = Kategori::where('id', $id)->first();
        $data = ([
            'kategori' => $kategori,
            'nama_kategori' => $baris->nama_kategori,
            'tombol' => 'Edit',
            'action' => url('editkategori', ['id' => $id]),
        ]);
        return view('admin.kategori.dataKategori')->with($data);
    }

    public function update(Request $request, $id){
        $kategori = Kategori::where('id', $id)->first();
        $data =([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori
        ]);
        $kategori->update($data);
        return redirect('dataKategori');
    }

    //Hapus Data
    public function hapus($id){
        $hapus = Kategori::where('id', $id)->delete();
        if($hapus){  
            return redirect('dataKategori');
        }else{
            Log::alert("Data Gagal dihapus");
        }
    }
}
