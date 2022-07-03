<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 1) {
                return $next($request);
            }else{
               return redirect('/cart');
            }
        });
    }

    public function admintest()
    {
        $role = Auth::user()->role;
        if($role == 2){
            return redirect('/home');
        }
        return 'Hello Admin!';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = count(Transaction::get());
        $tt = count(Transaction::whereBetween('created_at', [Carbon::today(), Carbon::tomorrow()])->get());
        $sales = Transaction::select(DB::raw("SUM(total) as todaySales"))->first();
        $Tsales = Transaction::select(DB::raw("SUM(total) as todaySales"))->whereBetween('created_at', [Carbon::today(), Carbon::tomorrow()])->first();
        $sales = $sales->todaySales;
        $Tsales = $Tsales->todaySales;
        if($Tsales == null) $Tsales = 0;
        // dd($Tsales);
        $product = count(Product::get());
        return view('home', compact(['transaction', 'product', 'sales', 'Tsales', 'tt']));
    }

    public function transaction()
    {
        $transactions = DB::table('transcations')
            ->get()
            ->sortByDesc("created_at");
            // dd($transactions);
        return view('transaction', compact(['transactions']));
    }

    public function transactionDetail($num)
    {
        $transaction = DB::table('transcations')
            ->select('transcations.*', 'users.name')
            ->where('invoice_number', $num)
            ->join('users', 'users.id', '=', 'transcations.user_id')
            ->first();
        $bought_products = DB::table('product_transaction')
            ->select('product_transaction.*', 'product.name', 'product.qty as stock', 'product.image', 'product.price')
            ->where('invoice_number', $num)
            ->join('product', 'product.id', '=', 'product_transaction.product_id')
            ->get();
        // dd($transaction);
        return view('transaction-detail', compact(['transaction', 'bought_products']));
    }

    public function deleteProduct($id){
        $delete = Product::where('id', $id)->first();
        if($delete){
            $delete->delete();
        }
        return redirect('/products')->with('success','Product Deleted');
    }
}
