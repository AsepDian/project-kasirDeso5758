<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $data = DetailTransaksi::all();
        return view('admin.laporan.index', compact('data'));
    }
}
