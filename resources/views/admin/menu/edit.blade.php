@extends('admin.layout.main')
@section('content')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Menu</h4>
                <form class="forms-sample" action="{{ route('menu.update', $menu->id) }}" method="post"
                    enctype="multipart/form-data" style="color: white">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="gambar">File upload</label>
                        <input type="file" name="gambar" class="file-upload-default" id="gambar"
                            value="{{ $menu->gambar }}" required>
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control text-white" id="exampleInputName1"
                            placeholder="Nama Menu" value="{{ $menu->nama_menu }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <select name="kategori_id" id="kategori" class="form-control text-white">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" class="text-white">{{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Harga</label>
                        <input type="text" name="harga" class="form-control text-white" id="exampleInputHarga2000"
                            placeholder="harga" value="{{ $menu->harga }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <a href="{{ route('menu.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
