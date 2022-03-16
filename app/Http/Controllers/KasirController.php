<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view('kasir.menu', compact('menu'));
    }
    public function oldtransaksi(){
        $transaksi = Transaksi::where('cash', '!=', null)->get();
        return view('kasir.oldtransaksi.index',compact('transaksi'));
    }
    public function edit($id)
    {
        $menu = Menu::all();
        $data = Transaksi::where('id', $id)->first();
        return view('kasir.oldtransaksi.detail', compact('menu','data'));
    }
    public function dashboard(){
        return view('kasir.dashboard');
    }
}
