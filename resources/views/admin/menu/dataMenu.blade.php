@extends('admin.layout.main')
@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Menu</h4>
                <a class="mdi mdi-book-plus btn btn-secondary" href="{{ route('menu.create') }}">Tambah Menu</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped text-white">
                        <thead>
                            <tr>
                                <th class="text-white"> No </th>
                                <th class="text-white"> Gambar </th>
                                <th class="text-white"> Nama Menu </th>
                                <th class="text-white"> Kategori </th>
                                <th class="text-white"> Harga </th>
                                <th class="text-white" colspan="2"> Aksi </th>
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
                                    <td>
                                        <a class="mdi mdi-border-color btn btn-success mb-1"
                                            href="{{ route('menu.edit', ['menu' => $values->id]) }}"></a>
                                        <form action="{{ route('menu.destroy', $values->id) }}" method="post"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="mdi mdi-delete btn btn-danger"></button>
                                        </form>
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
