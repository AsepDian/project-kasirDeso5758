@extends('kasir.layout.main')
@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Menu</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped text-white">
                        <thead>
                            <tr>
                                <th class="text-white"> NO </th>
                                <th class="text-white"> Gambar </th>
                                <th class="text-white"> Nama Menu </th>
                                <th class="text-white"> Kategori </th>
                                <th class="text-white"> Harga </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $values)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> <img src="{{ asset('storage/' . $values->gambar) }}" alt=""></td>
                                    <td> {{ $values->nama_menu }} </td>
                                    <td> {{ $values->kategori->nama_kategori }} </td>
                                    <td> {{ $values->harga }} </td>
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
