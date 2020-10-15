<?php

namespace App\Http\Controllers;

use App\Auction;
use App\subcat;
use App\subsub;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\Media;
use App\Product;
use App\Promotion;
use App\Sales;
use App\ShippingCost;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{

    public function index()
    {
        $products=Product::with('category','medias')->get();
        return view('admin.pages.product.manage',['products'=>$products]);

    }


    public function create()
    {
        $categories=Category::whereStatus('Active')->get();
        $subcat=subcat::all();
        $subsub=subsub::all();

        return view('admin.pages.product.create',['categories'=>$categories,'subcat'=>$subcat,'subsub'=>$subsub]);
    }


    public function store(Request $request)
    {

        $product = new Product();
        $product->name=$request->name;
        $product->sku_number=$request->sku_number;
        $product->category_id=$request->category_id;
        $product->subcat_id=$request->subcat_id;
        $product->sub_id=$request->sub_id;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->agent_price=$request->agent_price;
        $product->quantity=$request->quantity;
        $product->is_out_of_stock=$request->is_out_of_stock;
        $product->status=$request->status;
        $product->popular=$request->popular;
        $product->meta_tag=$request->meta_tag;
        $product->meta_description=$request->meta_description;
        if ($request->hasfile('product_image')) {
            $image = $request->file('product_image');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/'), $filename);
            $product->product_image = $filename;
        }
        $product->save();
        return redirect('/admin/product/create')
            ->with(['type'=>'success','message'=>'Product created Successfully']);
    }
    public function showProduct(Request $request, $id) {
        $product = Product::find($id);
        return view('admin.pages.product.show', ['product' => $product]);
    }

    public function show(Request $request,$id,$name)
    {
        $promotion=0;
        if($request->input('pcode')){
            $promotion=Promotion::whereCode($request->input('pcode'))->first();
            if(!$promotion){
                return back()->with(['type'=>'error','message'=>'Your Promotion code is not valid']);


            }else{
                if($promotion->at_least_amount>Cart::subtotal()){
                    $amount=$promotion->at_least_amount;
                    $promotion=0;
                    return back()->with(['type'=>'error',
                        'message'=>'You need to purchase at least this '.$amount.' amount']);
                }
            }


        }
        $item=Product::with('category')->whereId($id)->first();
        $shippingCost=ShippingCost::orderBy('id', 'desc')->first();
        $cartItems=Cart::content();
        return view('site.pages.product.product-details',[
            'item'=>$item,
            'shippingCost'=>$shippingCost,
            'cartItems'=>$cartItems,
            'promotion'=>$promotion
        ])->with(['type'=>'success','message'=>'Product created Successfully']);
    }


    public function edit(Product $product)
    {
        $category=Category::select('categories.name','categories.id')->get();
        $subcat=subcat::select('subcats.name','subcats.id')->get();
        $subsub=subsub::select('subsubs.name','subsubs.id')->get();

        return view('admin.pages.product.edit',['category'=>$category,'subcat'=>$subcat,'subsub'=>$subsub,'product'=>$product]);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name=$request->name;
        $product->sku_number=$request->sku_number;
        $product->category_id=$request->category_id;
        $product->subcat_id=$request->subcat_id;
        $product->sub_id=$request->sub_id;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->agent_price=$request->agent_price;
        $product->quantity=$request->quantity;
        $product->is_out_of_stock=$request->is_out_of_stock;
        $product->status=$request->status;
        $product->popular=$request->popular;
        $product->meta_tag=$request->meta_tag;
        $product->meta_description=$request->meta_description;
        $image_name = $request->hidden_image;
        $image = $request->file('product_image');

        if ($image != null) {

            unlink(public_path('images/products/') . $image_name);
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/'), $filename);
            $product->product_image = $filename;
        }
        else{
            $product->product_image = $image_name;
        }
        $product->save();

        return redirect('/admin/product')
            ->with(['type'=>'success','message'=>'Product Updated Successfully']);
    }

    public function destroy(Product $product)
    {
        $product=Product::find($product->id);
        $saleProduct = DB::table('sale_items')
                        ->select('id')
                        ->where('product_id','=',$product->id)
                        ->count();

        if( $saleProduct){

            return back()
                ->with([
                    'type'=>'error',
                    'message'=> "You have already ". $saleProduct." 
                     order with this Product. Please delete order first."]);
        } else {

            unlink(public_path('images/products/') . $product->product_image);
            $product->delete();
            return back()
                ->with(['type'=>'success','message'=>'Product deleted successfully']);
            }


    }

    public function getAllProduct(Request $request){
        $productList=Product::with('category','medias');
        if($request->input('search')){
            $productList=$productList->where('name','LIKE','%'.$request->input('search').'%');
        }
        if($request->input('catId')){
            $productList=$productList->whereCategoryId($request->input('catId'));
        }
        if($request->input('catName')){
            $productList = $productList->whereHas('category', function ($productList) use ($request) {
                $productList->where('name','like', $request->input('catName'));
            });
        }
        if($request->input('order')){
            $productList=$productList->orderBy('price',$request->input('order'));

        }
        $productList=$productList->where('quantity','>', 0)->paginate(20);
//        $categories=DB::table('categories')
//            ->join('products','categories.id','=','products.category_id')
//            ->select('categories.name','categories.id as catId',DB::raw('count(*) as catCount'))
//            ->groupBy('products.category_id','categories.name','categories.id')
//            ->get();
////        return view('site.pages.product.allProducts',['categories'=>$categories,'productList'=>$productList]);
//        return view('site.home-partials.products',['categories'=>$categories,'productList'=>$productList]);
        $categories=DB::table('categories')
            ->select('id','name')
            ->get();
        $subcat=DB::table('subcats')
            ->select('id','name','category_id')
            ->get();
        $subsub=DB::table('subsubs')
            ->select('*')
            ->get();

//        return view('site.pages.product.allProducts',['categories'=>$categories,'productList'=>$productList]);
        return view('site.home-partials.products',['categories'=>$categories,'productList'=>$productList,'subcat'=>$subcat,'subsub'=>$subsub]);
    }
    public function categoryProduct($id)
    {
        $productList=DB::table('products')
                    ->select('*')
                    ->where('category_id','=',$id)
                    ->get();

//
//        $categories=DB::table('categories')
//            ->select('id','name')
//            ->get();
//        $subcat=DB::table('subcats')
//            ->select('id','name','category_id')
//            ->get();
//        $subsub=DB::table('subsubs')
//            ->select('*')
//            ->get();


        return redirect()->back()->with('productList',$productList);


    }

}
