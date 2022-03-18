@extends('kasir.layout.main')
@section('content')
    <h1>Ini Halaman Kasir</h1>
    
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
@endsection
