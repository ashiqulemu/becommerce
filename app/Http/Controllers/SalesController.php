<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{

    public function index()
    {
        $sales=Sales::all();
        return view('admin.pages.sales.manage',['sales'=>$sales]);
    }

    public function ShowCreditSales() {
        $creditSales = Payment::wherePaymentableType("App\Package")->get();
        return view('admin.pages.sale-credit.manage',['creditSales' => $creditSales]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Sales $sales)
    {
        //
    }


    public function edit(Sales $sales)
    {
        //
    }


    public function update(Request $request, Sales $sales)
    {
        //
    }


    public function destroy(Sales $sales)
    {
        //
    }

    public function updateOrderStatus (Request $request, $orderId, $status) {
       $sale = Sales::with('items')->whereId($orderId)->first();
        if($sale->order_status != $status) {
            foreach ($sale->items as $item) {
                $product = Product::whereId($item->product_id)->first();
                if($sale->order_status == 'Cancel' && $status != 'Cancel') {
                    $product->update(['quantity' => $product->quantity - $item->quantity]);
                }else if($sale->order_status != 'Cancel' && $status == 'Cancel'){
                    $product->update(['quantity' => $product->quantity + $item->quantity]);
                }
            }
        }

       $sale->update(['order_status' => $status]);

       return back()->with([
          'type'     => 'success',
           'message' => 'Order status updated successfully'
       ]);
    }
}
