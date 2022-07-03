@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-2">
            <h2 class="font-weight-bold">
                Hello there, {{ Auth::user()->name }}!
            </h2>
        </div>
        <div class="col-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row d-flex flex-row align-items-center">
                        <div class="col-8">
                            <small class="font-weight-bold text-primary">Today's Sales</small>
                            <h5 class="mt-1" style="font-weight: 500;">Rp.{{ number_format($Tsales,0,',','.') }},-</h5>
                        </div>
                        <div class="col-4">
                            <div class="bg-primary p-3 text-center" style="border-radius: 100px;">
                                <i class="fas fa-money-bill-wave text-white" style="font-size:16px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row d-flex flex-row align-items-center">
                        <div class="col-8">
                            <small class="font-weight-bold text-warning">Today's Transaction</small>
                            <h5 class="mt-1" style="font-weight: 500;">{{ $tt }}</h5>
                        </div>
                        <div class="col-4">
                            <div class="bg-warning p-3 text-center" style="border-radius: 100px;">
                                <i class="fas fa-file-invoice text-white" style="font-size:16px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row d-flex flex-row align-items-center">
                        <div class="col-8">
                            <small class="font-weight-bold text-success">Total Product</small>
                            <h5 class="mt-1" style="font-weight: 500;">{{ $product }}</h5>
                        </div>
                        <div class="col-4">
                            <div class="bg-success p-3 text-center" style="border-radius: 100px;">
                                <i class="fas fa-cubes text-white" style="font-size:16px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row d-flex flex-row align-items-center">
                        <div class="col-8">
                            <small class="font-weight-bold text-info">Total Sales</small>
                            <h5 class="mt-1" style="font-weight: 500;"> Rp.{{ number_format($sales,0,',','.') }},-</h5>
                        </div>
                        <div class="col-4">
                            <div class="bg-info p-3 text-center" style="border-radius: 100px;">
                                <i class="fas fa-cash-register text-white" style="font-size:16px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
