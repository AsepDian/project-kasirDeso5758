<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request){
        if($request->has('forDate')&&$request->has('toDate')){
            $data = Transaksi::whereBetween('tanggal', [$request->forDate, $request->toDate])->get();
        }else{
            $data = Transaksi::all();
        }
        return view('admin.laporan.index', compact('data'));
    }
    public function cetak(){
        $data = DetailTransaksi::all();
        $pdf = Pdf::loadView('admin.laporan.cetak', compact('data'));
        return $pdf->stream('invoice.pdf');
    }
}
