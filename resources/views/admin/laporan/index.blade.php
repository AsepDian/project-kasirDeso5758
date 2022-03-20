@extends('admin.layout.main')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Pemasukan</h3>
            </div>
            <form action="" method="get" class="form-inline" style="margin-left: 12%">
                <label class="sr-only" for="inlineFormInputName2">Dari</label>
                <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="forDate">
                <label class="sr-only" for="inlineFormInputGroupUsername2">Sampai</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2" name="toDate">
                </div>
                <button name="cari" type="submit" class="btn btn-primary mb-2">Submit</button>
                <button name="cetak" class="btn btn-danger mb-2" style="margin-left: 3px;">Cetak</button>
            </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" border="1">
                        <thead>
                            <tr>
                                <th class="text-white"> <b>No</b> </th>
                                <th class="text-white"> <b>Tanggal</b> </th>
                                <th class="text-white"> <b>Nama menu</b> </th>
                                <th class="text-white"> <b>Harga</b> </th>
                                <th class="text-white"> <b>Jumlah</b> </th>
                                <th class="text-white"> <b>Subtotal</b> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $values)
                                @foreach($values->detail_transaksi as $v)
                                <tr>
                                    <td class="text-white">{{ $loop->iteration }}</td>
                                    <td class="text-white">{{ $v->transaksi->tanggal }}</td>
                                    <td class="text-white">{{ $v->menu->nama_menu }}</td>
                                    <td class="text-white">{{ $v->menu->harga }}</td>
                                    <td class="text-white">{{ $v->jumlah }}</td>
                                    <td class="text-white">{{ $v->subtotal }}</td>
                                </tr>
                                @endforeach
                            @endforeach
                            {{-- <tr>
                                <td colspan="5" class="text-white text-center">Total pemasukan</td>
                                <td class="text-white">{{ $data->sum('subtotal') }}</td>
                            </tr> --}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.table-hover').DataTable()
    </script>
@endpush
