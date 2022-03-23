@extends('kasir.layout.main')
@section('content')
@foreach ($data as $m )
<div class="col-12 col-md-4 mb-4">
        <div class="card">
            <div class="card-body" style="display: inline-block; margin:auto; text-align:center;">
                    <img src="{{ asset('storage/'.$m->gambar ) }}" alt="" width="200" height="150" style="border-radius: 5px;"><br>
                    <h3 style="margin-top: 5px">{{ $m->nama_menu }}</h3><br>
                    <h5>Rp. {{ $m->harga }}</h5>
                    {{-- <button type="submit" class="btn btn-primary">Pesan</button> --}}
             </div>
         </div>
</div>
@endforeach
@endsection
