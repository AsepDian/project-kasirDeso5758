@extends('admin.layout.main')
@section('content')
    <div class="row">
        <div class="col-xl-5 col-sm-6 grid-margin stretch-card">
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
        <div class="col-xl-5 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $menu }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-book-open-page-variant"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Menu</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $kategori }}</h3>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Kategori</h6>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4 col-sm-6 grid-margin stretch-card" style="display: inline-block;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">$31.53</h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
