<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('admin.menu.dataMenu')->with(['menu'=> $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data['kategori'] = Kategori::get();
            return view('admin.menu.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->store('image-menu');
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'gambar' => $gambar,

        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::get();
        $menu = Menu::where('id', $id)->first();
        return view('admin.menu.edit', compact('menu','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $menu = Menu::where('id', $id)->first();
        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('image-menu');
        }
        $data = ([
            'gambar' => $gambar??'',
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id
        ]);
        // if($request->file('oldgambar')){
        //     if($request->oldgambar){
        //         Storage::delete($request->oldgambar);
        //     }
        //     $oldgambar = $request->file('oldgambar')->store('image-menu');
        // }
        
        $menu->update($data);
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Menu::where('id', $id)->delete();
        if($hapus){
            return redirect()->route('menu.index');
        }else{
            Log::alert("Data Gagal Dihapus");
        }
    }
}
