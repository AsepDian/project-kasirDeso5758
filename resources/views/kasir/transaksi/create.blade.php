@extends('kasir.layout.main')
@section('content')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Menu</h4>
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Pemesan</label>
                        <input type="text" name="nama" class="form-control text-white" id="exampleInputName1"
                            placeholder="Nama Pemesan">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                    <a href="{{ route('transaksi.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
