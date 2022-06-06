<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('shop.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        if ($request->image !== null) {
            $image = $request->image;
            $uniqueFileName = uniqid(rand()) . '.' . $image->getClientOriginalExtension();
            $target_path = public_path('uploads/products/');
            $image->move($target_path, $uniqueFileName);
        } else {
            $uniqueFileName = '';
        }

        $product = new Product;
        $product->shop_id = Auth::user()->id;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->image = $uniqueFileName;
        $product->expired_at = $request->expired_at;
        $product->save();

        return redirect()->route('shop.mypage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::where('id', $id)->first();
        if ($product->user_id !== null) {
            return redirect()->route('shop.mypage.index');
        }
        $categories = Category::get();
        return view('shop.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function detail($id)
    {
        //
        $product = Product::where('id', $id)->first();
        $categories = Category::get();
        return view('shop.product.detail', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        if ($request->image !== null) {
            $image = $request->image;
            $uniqueFileName = uniqid(rand()) . '.' . $image->getClientOriginalExtension();
            $target_path = public_path('uploads/products/');
            $image->move($target_path, $uniqueFileName);
            $product->image = $uniqueFileName;
        } else {
            $uniqueFileName = '';
        }

        $product->shop_id = Auth::user()->id;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('shop.mypage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('shop.mypage.index');
    }

    public function sellIndex(Shop $shop)
    {
        $products = $shop->products()->orderBy('updated_at', 'desc')->paginate(5);
        // dd($products);
        return view('shop.product.sell', ['products' => $products]);
    }

    public function soldIndex(Shop $shop)
    {
        $query = Product::query();
        $query->where('receive_flg', 0);
        $query->where('shop_id', Auth::id())
            ->whereNotNull('user_id')
            ->take(5)
            ->orderBy('updated_at', 'desc');
        $products = $query->paginate(5);
        return view('shop.product.sold', ['products' => $products]);
    }

    public function receive(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('shop.login');
        }
        $query = Product::query();
        $product = $query->where('id', $request->product_id)
                        ->first();
        $product->receive_flg = 1;
        $product->save();
        // return redirect()->route('product.index');
        return back();
    }
}
