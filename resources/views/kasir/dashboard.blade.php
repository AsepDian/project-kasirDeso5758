@extends('kasir.layout.main')
@section('content')
@foreach ($data as $m )
<div class="col-12 col-md-4 mb-4">
        <div class="card">
            <div class="card-body" style="display: inline-block;">
                <div class="card-title">Daftar Menu</div>
                    <img src="{{ asset('storage'.$m->gambar ) }}" alt=""><br>
                    <h3>{{ $m->nama_menu }}</h3><br>
                    <p><i>{{ $m->kategori->nama_kategori }}</i></p><br>
                    <h5>Rp. {{ $m->harga }}</h5>
             </div>
         </div>
</div>
@endforeach
@endsection
