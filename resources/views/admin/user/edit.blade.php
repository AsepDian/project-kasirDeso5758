@extends('admin.layout.main')
@section('content')
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit User</h4>
                <form class="forms-sample" method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror text-white"
                            name="nama" value="{{ $user->nama }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-white"
                            name="email" value="{{ $user->email }}" required autocomplete="email">

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
                            class="form-control @error('password') is-invalid @enderror text-white" name="password"
                            autocomplete="new-password" value="{{ old('password') }}">

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
                            name="password_confirmation" autocomplete="new-password" value="{{ old('password') }}">
                    </div>
                    <?php
                    if ($user->level == 'admin') {
                        $a = 'selected';
                    } else {
                        $a = '';
                    }
                    if ($user->level == 'kasir') {
                        $k = 'selected';
                    } else {
                        $k = '';
                    }
                    ?>
                    <div class="form-group">
                        <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                        <select name="level" id="" class="form-control text-white" required autocomplete="new-password">
                            <option value="">--pilih level--</option>
                            <option value="admin" {{ $a }} class="text-white">Admin</option>
                            <option value="kasir" {{ $k }} class="text-white">Kasir</option>
                        </select>
                    </div>
                    {{-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <a href="{{ route('user.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
