<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeDataController extends Controller
{
    public function index(){
        if(auth()->user()){
            return redirect('/user-home');
        }
        if(request()->input('ref')) {
            Session::put('ref', request()->input('ref'));
        }


        $productList=Product::with('category','medias')
            ->whereStatus(1)->where('quantity','>', 0)->latest()->take(15)->get();
        $category=DB::table('categories')
            ->select('*')
            ->where('status','=',1)
            ->latest()
            ->take(6)
            ->get();


        return view('site.pages.home',[

            'productList'=>$productList,
            'category'=>$category,

        ]);
    }
}
