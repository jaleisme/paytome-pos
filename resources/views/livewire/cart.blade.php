<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6"><h3 class="font-weight-bold">Products List</h3></div>
                    <div class="col-md-6"> <input wire:model="search" type="text" class="form-control" placeholder="Search Products..."></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-3 mb-3" :key="{{$product->id}}">
                            <div class="card" wire:click="addItem({{$product->id}})" style="cursor:pointer">
                                <img src="{{ asset('storage/images/'.$product->image)}}" alt="product" style="width:100%;">
                                <button class="btn btn-primary btn-sm" style="position:absolute;top:0;right:0;padding: 10px 15px"><i class="fas fa-cart-plus fa-lg"></i></button>
                                <h6 class="text-center font-weight-bold mt-2">{{$product->name}}</h6>
                                <h6 class="text-center font-weight-bold" style="color:grey">Rp {{number_format($product->price,0,',','.')}}</h6>
                            </div>
                        </div>
                    @empty
                    <div class="col-sm-12 mt-5">
                        <h2 class="text-center font-weight-bold text-primary">There isn't any product yet.</h2>
                    </div>
                    @endforelse
                </div>
                <div style="display:flex;justify-content:center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row ">
                    <div class="col-12">
                        <h3 class="font-weight-bold">Cart Summary</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="cart-current">
                    @if(session()->has('error'))
                        <p class="text-danger font-weight-bold">
                            {{session('error')}}
                        </p>
                    @endif
                    <table class="table table-sm table-bordered table-hovered text-center">
                        <thead class="bg-white">
                            <tr>
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">Name</th>
                                <th class="font-weight-bold">Qty</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carts as $index=>$cart)
                                <tr>
                                    <td>
                                        {{$index + 1}}
                                    </td>
                                    <td class="text-left px-3">
                                        <a href="#" class="font-weight-bold text-dark">{{$cart['name']}}</a>
                                        <br>
                                        <a href="">Rp.{{number_format($cart['pricesingle'],0,',','.')}},-</a>
                                    </td>
                                    <td class="d-flex align-items-center justify-content-center h-100">
                                        <button class="btn btn-light btn-sm mr-3" style="padding:7px; font-size: 8px;" wire:click="increaseItem('{{$cart['rowId']}}')"><i class="fas fa-plus"></i></button>
                                        <span style="font-size: 16px;">{{$cart['qty']}}</span>
                                        <button class="btn btn-light btn-sm ml-3" style="padding:7px; font-size: 8px"  wire:click="decreaseItem('{{$cart['rowId']}}')"><i class="fas fa-minus"></i></button>
                                    </td>
                                    <td>Rp.{{number_format($cart['price'],0,',','.')}},-</td>
                                    <td>
                                        <center>
                                            <button class="btn btn-sm btn-danger" wire:click="removeItem('{{$cart['rowId']}}')" style="padding:7px; font-size: 8px;">
                                                <i class="fas fa-trash"  style="font-size:12px;cursor:pointer;"></i>
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There isn't any item yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-8">
                        Sub-total
                    </div>
                    <div class="col-4">
                        Rp.{{ number_format($summary['sub_total'],0,',','.') }},-
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Tax
                    </div>
                    <div class="col-4">
                        Rp.{{ number_format($summary['pajak'],0,',','.') }},-
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 font-weight-bold">
                        Total
                    </div>
                    <div class="col-4 font-weight-bold" id="oke">
                        Rp.{{ number_format($summary['total'],0,',','.') }},-
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-8">
                        Cash Paid
                    </div>
                    <div class="col-4" id="paymentText" wire:ignore>
                        Rp.0,-
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Changes
                    </div>
                    <div class="col-4" id="kembalianText" wire:ignore>
                        Rp.0,-
                    </div>
                </div>

                <hr>

                <div class="form-group mt-4">
                    <label for="">Cash Amount</label>
                    <input type="number" wire:model="payment" class="form-control" id="payment" placeholder="Input customer payment amount">
                    <input type="hidden" id="total" value="{{$summary['total']}}">
                </div>

                <div class="row mt-2">
                    <div class="col-sm-6">
                         <button wire:click="enableTax" class="btn btn-primary btn-block btn-sm">Apply Tax</button>
                    </div>
                    <div class="col-sm-6">
                          <button wire:click="disableTax" class="btn btn-danger btn-block btn-sm">Remove Tax</button>
                    </div>
                </div>



                <form wire:submit.prevent="handleSubmit">
                    <div class="mt-4">
                        <button wire:ignore type="submit" id="saveButton" disabled class="btn btn-success btn-block" id="saveButton"><i class="fas fa-save fa-lg"></i> Save Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script-custom')
    <script>
        payment.oninput = () => {
            const paymentAmount = document.getElementById("payment").value
            const totalAmount = document.getElementById("total").value

            const kembalian = paymentAmount - totalAmount

            document.getElementById("kembalianText").innerHTML = `Rp ${rupiah(kembalian)} ,00`
            document.getElementById("paymentText").innerHTML = `Rp ${rupiah(paymentAmount)} ,00`

            const saveButton =  document.getElementById("saveButton")

            if(kembalian < 0){
                saveButton.disabled = true
            }else{
                saveButton.disabled = false
            }
        }

        const rupiah = (angka) => {
            const numberString = angka.toString()
            const split = numberString.split(',')
            const sisa = split[0].length % 3
            let rupiah = split[0].substr(0, sisa)
            const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

            if(ribuan){
                const separator = sisa ? '.' : ''
                rupiah += separator + ribuan.join('.')
            }

            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
        }
    </script>
@endpush


