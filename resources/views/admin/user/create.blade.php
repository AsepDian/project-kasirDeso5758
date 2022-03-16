@extends('admin.layout.main')
@section('content')
    <div class="col-10">
        <div class="card text-white">
            <div class="card-body">
                <h4 class="card-title">Form Tambah User</h4>
                <form class="forms-sample" method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror text-white"
                            name="nama" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-white"
                            name="email" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Password Baru') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror text-white" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control text-white"
                            name="password_confirmation" required autocomplete="new-password">
                        <div class="form-group">
                            <label for="level" class="col-md-4 col-form-label text-md-end"
                                for="level">{{ __('Level') }}</label>
                            <select name="level" id="level" class="form-control text-white" required
                                autocomplete="new-password">
                                <option value="" class="text-white">--pilih level--</option>
                                <option value="admin" class="text-white">Admin</option>
                                <option value="kasir" class="text-white">Kasir</option>
                            </select>
                        </div>
                        {{-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> --}}
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ route('user.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
