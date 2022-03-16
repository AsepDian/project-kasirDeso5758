@extends('admin.layout.main')
@section('content')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Kategori</h4>
                <form class="form-inline" method="post" action="{{ $action }}">
                    @csrf
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Nama Kategori</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="nama_kategori" class="form-control text-white"
                            id="inlineFormInputGroupUsername2" placeholder="Nama Kategori"
                            value="{{ $nama_kategori ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kategori</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th class="text-white"> No </th>
                                <th class="text-white"> Nama Kategori </th>
                                <th class="text-white"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody class="text-white">
                            @foreach ($kategori as $values)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $values->nama_kategori }} </td>
                                    <td>
                                        <a class="mdi mdi-border-color btn btn-success"
                                            href="{{ url('editkategori', ['id' => $values->id]) }}"></a>
                                        <a class="mdi mdi-delete btn btn-danger"
                                            href="{{ url('hapuskategori', ['id' => $values->id]) }}"></a>
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
