@extends('kasir.layout.main')
@section('content')
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $user }}</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-account-outline"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total User</h6>
            </div>
        </div>
    </div>
@endsection
