@extends('admin.layout.main')

@section('content')
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data User</h4>
                <a href="{{ route('user.create') }}" class="btn btn-secondary mdi mdi-account-plus"
                    style="margin-right: 20px">
                    TambahData
                </a>
                <div class="table-responsive">
                    <table class="table table-striped mb-10 text-white">
                        <thead>
                            <tr>
                                <th class="text-white"> No </th>
                                {{-- <th class="text-white"> Gambar</th> --}}
                                <th class="text-white"> Nama </th>
                                <th class="text-white"> Email </th>
                                <th class="text-white"> Level </th>
                                <th class="text-white" colspan="2"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $values)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $values->nama }}</td>
                                    <td>{{ $values->email }}</td>
                                    <td>{{ $values->level }}</td>
                                    <td>
                                        <a class="mdi mdi-border-color btn btn-success mb-1"
                                            href="{{ route('user.edit', ['user' => $values->id]) }}"></a>
                                        <form action="{{ route('user.destroy', $values->id) }}" method="post"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="mdi mdi-delete btn btn-danger" style="margin-left: -3"></button>
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
