<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Laporan;
use App\Models\Menu;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $toDate = $request->toDate;
        $forDate = $request->forDate;
        if ($request->has('forDate') && $request->has('toDate')) {
            $data = Laporan::whereBetween('tanggal', [$request->forDate, $request->toDate])->get();
        } else {
            $data = Laporan::all();
        }
        if($request->has('cetak')){
            $pdf = Pdf::loadView('admin.laporan.cetak', compact('data','toDate','forDate'));
            return $pdf->stream('invoice.pdf');
        }
        return view('admin.laporan.index', compact('data'));
    }
}
