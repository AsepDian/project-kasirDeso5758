@extends('admin.layout.main')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Pemasukan</h3>
            </div>
            <form action="{{ url('cari') }}" method="post" class="form-inline" style="margin-left: 12%">
                @csrf
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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
                                <tr>
                                    <td class="text-white">{{ $loop->iteration }}</td>
                                    <td class="text-white">{{ $values->transaksi->tanggal }}</td>
                                    <td class="text-white">{{ $values->menu->nama_menu }}</td>
                                    <td class="text-white">{{ $values->menu->harga }}</td>
                                    <td class="text-white">{{ $values->jumlah }}</td>
                                    <td class="text-white">{{ $values->subtotal }}</td>
                                </tr>
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
