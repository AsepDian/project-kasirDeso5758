@extends('kasir.layout.main')
@section('content')
    <div class="col-12 col-md-4">
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
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Input Pembelian</div>
                <form action="{{ route('transaksi.update', $data) }}" method="post" class="text-white">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Menu</label>
                        <select class="js-example-basic-single form-control" name="menu_id">
                            <option value="">--Pilih Menu--</option>
                            @foreach ($menu as $m)
                                <option value="{{ $m->id }}" class="text-white">{{ $m->nama_menu }} (Rp.
                                    {{ $m->harga }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control text-white">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Pembelian</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-white">
                        <thead>
                            <tr class="text-white">
                                <th>No</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->detail_transaksi as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->menu->nama_menu }}</td>
                                    <td>Rp. {{ $v->menu->harga }}</td>
                                    <form action="{{ url('transaksi/update',['id'=>$v->id]) }}" method="post">
                                        @csrf
                                        <td><input class="form-control text-white" type="number" name="jumlah" value="{{ $v->jumlah }}"></td>
                                        <td>{{ $v->subtotal }}</td>
                                        <td><button type="submit" class="btn btn-success mdi mdi-auto-fix"></button></td>
                                    </form>
                                    <td><a href="{{ url('transaksi/hapus', ['id'=>$v->id]) }}" class="btn btn-danger mdi mdi-delete"></a></td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="center">Total</td>
                                <td colspan="3">Rp. {{ $data->detail_transaksi->sum('subtotal') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="{{ url('transaksi/bayar/' . $data->id) }}" method="post"
                    class="row d-flex justify-content-end">
                    @csrf
                    <div class="form-group mt-3 col-4">
                        <label for="cash">Bayar</label>
                        <div class="input-group">
                            <input type="number" id="cash" name="cash" class="form-control text-white">
                            <button class="btn btn-success">Bayar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('sweetalert::alert')
