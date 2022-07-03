@extends('layouts.app')

@section('content')
<div class="row px-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-12"><h3 class="font-weight-bold">History Transaction</h3></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hovered text-center">
                    <thead class="bg-white">
                        <tr>
                            <th class="font-weight-bold">Invoice Number</th>
                            <th class="font-weight-bold">Total Price</th>
                            <th class="font-weight-bold">Cash Paid</th>
                            <th class="font-weight-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td class="">{{ $transaction->invoice_number }}</td>
                            <td class="">{{ $transaction->total }}</td>
                            <td class="">{{ $transaction->pay }}</td>
                            <td class="">
                                <a href="/transaction/{{ $transaction->invoice_number }}" class="btn btn-sm btn-secondary">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
