@extends('layouts.app')

@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-1 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3 d-flex flex-row align-items-center">
                                    <a href="/transactions" class="text-body mr-2">
                                        <h4>
                                            <i class="fas fa-long-arrow-alt-left me-2"></i>
                                        </h4>
                                    </a>
                                    <h3 class="font-weight-bold">History Transaction "{{ $transaction->invoice_number }}"</h3>
                                </div>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1">Bought Item(s)</p>
                                        <p class="mb-0"><span class="font-weight-bold">{{ count( $bought_products) }}</span> item(s) was bought in this transaction.</p>
                                    </div>
                                </div>

                                @foreach ($bought_products as $item)
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <img src="{{ asset('storage/images/'.$item->image)}}" alt="product" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="font-weight-bold">{{ $item->name }} - {{ $item->qty }}x</h5>
                                                    <p class="small mb-0">Rp.{{number_format($item->price,0,',','.')}}/pcs</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 200px;" class="text-right">
                                                    <h5 class="mb-0">Rp.{{number_format(($item->price*$item->qty),0,',','.')}},-</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-lg-5">
                                <div class="card h-100 bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Transaction Summary</h5>
                                        </div>
                                        <hr class="my-3 text-white border-white">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Held By</p>
                                            <p class="mb-2">{{ $transaction->name }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">Rp.{{number_format($transaction->total,0,',','.')}},-</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Cash Paid</p>
                                            <p class="mb-2">Rp.{{number_format($transaction->pay,0,',','.')}},-</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Changes</p>
                                            <p class="mb-2">Rp.{{number_format(($transaction->pay - $transaction->total),0,',','.')}},-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
