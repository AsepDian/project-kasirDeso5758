<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index(){
        $data['user'] = Users::count();
        return view('kasir.menu', $data);
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
        $data = Menu::get();
        return view('kasir.dashboard', compact('data'));
    }

    public function cari(Request $request){
        $forDate = $request->input('forDate');
        $toDate  = $request->input('toDate');

        $transaksi = Transaksi::
        where('tanggal',$forDate)->where('tanggal', '<=', $toDate)->find();
        dd($transaksi);
        return view('admin.laporan.cek', compact('transaksi'));
    }
}
