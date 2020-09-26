<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bid;
use App\Payment;
use App\Product;
use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
   public function dashboard() {

       $orders = Sales::groupBy('order_no')->select();
       $creditSales = Payment::wherePaymentableType("App\Package")->select();
       $auctions = Auction::whereStatus('active');
       $totalOrders = count($orders->get());
       $totalTodayOrders = count($orders->whereDate('created_at', Carbon::today())->get());
       $totalMonthlyOrders = count($orders
           ->whereYear('created_at', Carbon::now()->year)
           ->whereMonth('created_at', Carbon::now()->month)->get());
       $totalAuctions = Auction::count();
       $totalProducts = Product::count();
       $totalBids = Bid::count();
       $totalAutoBids = Bid::whereFromAutoBid(1)->count();
       $totalUpComingAuctions = $auctions->where('up_time', '>', Carbon::now()->format('Y-m-d H:i:s'))->count();
       $totalCreditSales = $creditSales->count();
       $totalCreditSalesAmount = $creditSales->sum('amount');


       return view('admin.pages.dashboard', [
           'totalOrders'                => $totalOrders,
           'totalTodayOrders'           => $totalTodayOrders,
           'totalMonthlyOrders'         => $totalMonthlyOrders,
           'totalAuctions'              => $totalAuctions,
           'totalUpComingAuctions'      => $totalUpComingAuctions,
           'totalProducts'              => $totalProducts,
           'totalBids'                  => $totalBids,
           'totalAutoBids'              => $totalAutoBids,
           'totalCreditSalesAmount'     => $totalCreditSalesAmount,
           'totalCreditSales'           => $totalCreditSales,
       ]);
   }
    public function quizindex()
    {
        $user =auth()->user()->id;

        $quizzes=DB::table('quizzes')
            ->select('id','quiz')
            ->where('admin_id',$user )
            ->where('status',1)
            ->first();
        $record=DB::table('prizes')
            ->select('*')
            ->get();


        return view('admin.pages.quiz.dasboard', ['quiz' => $quizzes,'record' => $record]);

    }

}
