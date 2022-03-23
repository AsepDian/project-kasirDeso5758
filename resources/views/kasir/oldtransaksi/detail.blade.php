@extends('kasir.layout.main')
@section('content')
    <div class="col-12 col-md-4">
        <div class="form-group mt-3 col-7">
            <a class="btn btn-warning" href="{{ url('kasirtrans') }}"><i>
                    < Kembali</i></a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-title">Data Pembeli</div>
                <table class="table table-bordered text-white">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $data->nama_pemesan }}</td>
                    </tr>
                    <tr>
                        <td>Tgl</td>
                        <td>:</td>
                        <td>{{ $data->tanggal }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Pembelian</h4>
                <table class="table table-bordered text-white">
                    <thead>
                        <tr class="text-white">
                            <th>No</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->detail_transaksi as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->menu->nama_menu }}</td>
                                <td>{{ $v->menu->harga }}</td>
                                <td>{{ $v->jumlah }}</td>
                                <td>{{ $v->subtotal }}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" align="center">Total</td>
                            <td>{{ $data->detail_transaksi->sum('subtotal') }}</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ url('transaksi/cetak/' . $data->id) }}" method="post"
                    class="row d-flex justify-content-end">
                    @csrf
                    <div class="form-group mt-3 col-4">
                        <div class="input-group">
                            <button class="btn btn-success">Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
