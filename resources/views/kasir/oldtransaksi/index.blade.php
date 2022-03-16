@extends('kasir.layout.main')
@section('content')
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transaksi Lama</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" border="1">
                        <thead>
                            <tr>
                                <th class="text-white"> <b>No</b> </th>
                                <th class="text-white"> <b>Tanggal</b> </th>
                                <th class="text-white"> <b>Nama Pemesan</b> </th>
                                <th class="text-white"> <b>Tombol</b> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $values)
                                <tr>
                                    <td class="text-white">{{ $loop->iteration }}</td>
                                    <td class="text-white">{{ $values->tanggal }}</td>
                                    <td class="text-white">{{ $values->nama_pemesan }}</td>
                                    <td class="text-white"><a href="{{ url('detail/edit', ['id' => $values->id]) }}"
                                            class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
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
