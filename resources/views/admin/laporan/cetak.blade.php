
<h3 style="text-align: center;">Laporan Pemasukan/Pendapatan</h3>
<p style="text-align: center;">Kedai Deso5758</p>
<p style="text-align: center;">____________________________________________________________________</p>
<table border="1" align="center" style="text-align: center;">
    <tr>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">No</th>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">Tanggal</th>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">Nama Menu</th>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">Jumlah</th>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">Harga</th>
        <th style="padding: 5px; padding-left: 5px; padding-right:5px;">subtotal</th>
        
    </tr>
    @foreach ($data as $v)
    <tr>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">{{ $loop->iteration }}</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">{{ $v->transaksi->tanggal }}</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">{{ $v->menu->nama_menu }}</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">{{ $v->jumlah }}</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">Rp. {{ $v->menu->harga }}</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">Rp. {{ $v->subtotal }}</td>
    </tr>
    @endforeach
    <tr>
        <td style="text-align: center;" colspan="5">Jumlah pendapatan</td>
        <td style="padding: 5px; padding-left: 5px; padding-right:5px;">Rp. {{ $data->sum('subtotal') }}</td>
    </tr>
</table>