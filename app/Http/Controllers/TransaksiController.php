<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Mike42\Escpos\Printer;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class TransaksiController extends Controller
{
    private $printerLength = 32;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('cash', null)->get();
        return view('kasir.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::get();
        return view('kasir.transaksi.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Transaksi::create([
            'nama_pemesan' => $request->nama,
        ]);
        return redirect()->route('transaksi.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::all();
        $data = Transaksi::where('id', $id)->first();
        return view('kasir.transaksi.bayar', compact('menu','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $menu = Menu::where('id', $request->menu_id)->first();
        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'subtotal' => $request->jumlah*$menu->harga
        ]);

        return back();
    }

    public function bayar(Request $request, Transaksi $transaksi)
    {
        $transaksi->update(['cash'=>$request->cash]);

        $connector = new WindowsPrintConnector("Printer Kasir");

        /* Print a "Detail Pembelian" struk" */
        $printer = new Printer($connector);
        $printer->text("================================");
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(2,6);
        $printer->text("Kedai Deso 5757\n");
        $printer->setTextSize(1,1);
        $printer->text("Jln.Raya Garut Singaparna\n");
        $printer->text("Kp.Sunia Sari Desa.Sukasukur\n");
        $printer->text("================================\n");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Nama    : ".substr($transaksi->nama_pemesan, 0, 20)."\n");
        $printer->text("Tanggal : ".$transaksi->tanggal."\n");
        $printer->text("================================"); //32 karakter
        $printer->text("Detail Pembelian\n");
        $printer->text("--------------------------------");
        $total = 0;
        foreach($transaksi->detail_transaksi as $dt){
            $menu = $dt->jumlah.' '.$dt->menu->nama_menu;
            $subtotal = $this->harga($dt->subtotal);
            $dot = $this->dot(strlen($menu) + strlen($subtotal));
            $printer->text($menu.$dot.$subtotal);
            $total += $dt->subtotal;
        }
        $total_harga = $this->harga($total);
        $tot = $this->dot(5 + strlen($total_harga));
        $printer->text("--------------------------------");
        $printer->text('Total'.$tot.$total_harga);
        $bayar = $this->harga($request->cash);
        $bay = $this->dot(5 + strlen($bayar));
        $printer->text('Bayar'.$bay.$bayar);
        $printer->text("--------------------------------");
        $kembalian = abs($total - $request->cash);
        $kem = $this->harga($kembalian);
        $kem_dot = $this->dot(9 + strlen($kem));
        $printer->text('Kembalian'.$kem_dot.$kem);
        $printer->text("\n\n\n");
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("================================\n");
        $printer->text("###LUNAS###\n");
        $printer->text("================================\n");
        $printer->text("Terima Kasih Telah Belanja ^-^\n");
        $printer->text("Silahkan Datang kembali\n");
        $printer->cut();
        
        /* Close printer */
        $printer->close();
        return redirect('transaksi');
    }

    private function dot($count)
    {
        $dot = '';
        for($i = 0; $i < $this->printerLength - $count; $i++){
            $dot .= '.';
        }
        return $dot;
    }

    private function harga($harga, $prefix = 'Rp')
    {
        return $prefix.'. '.number_format($harga, 0, ',', '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
