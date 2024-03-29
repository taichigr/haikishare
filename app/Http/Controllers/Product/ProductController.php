<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

// 商品関連処理 商品一覧と詳細
class ProductController extends Controller
{
    // 商品一覧ページ表示
    public function index(Request $request)
    {
        //
        $query = Product::query();
        $query->where('receive_flg', 0);
        if(!$request->has('prefecture_id') && !$request->has('price_id') && !$request->has('limit')) {
            $products = $query->orderBy('created_at', 'desc')->paginate(9);
            $categories = Category::all();
            return view('product.index', ['products' => $products, 'categories' => $categories]);
        }
        if($request->has('prefecture_id')) {
            $pref_id = $request->prefecture_id;
        }
        if($request->has('price_id')) {
            $price_id = $request->price_id;
        }
        if($request->has('limit')) {
            $limit = $request->limit;
        }
        //  prefecture, price, limitによって場合分け
        // 都道府県
        if($request->prefecture_id !== null) {
            $pref_id = $request->prefecture_id;
            $query->join('shops', 'products.shop_id', '=', 'shops.id')
                ->where('prefecture_id', $pref_id);
        }
        // priceの入力があったとき
        if($request->price_id !== null) {
            $price_id = $request->price_id;
            if($price_id == 1) {
                $query->whereBetween('price', [1,100]);
            }
            if($price_id == 2) {
                $query->whereBetween('price', [101,200]);
            }
            if($price_id == 3) {
                $query->whereBetween('price', [201,400]);
            }
            if($price_id == 4) {
                $query->whereBetween('price', [401,700]);
            }
            if($price_id == 5) {
                $query->whereBetween('price', [701,1000]);
            }
            if($price_id == 6) {
                $query->whereBetween('price', '<', 1000);
            }
        }
        // 賞味期限の入力があったとき
        if($request->limit !== null) {
            $limit = $request->limit;
            $date = Carbon::now();
            if($limit == 1) {
                $query->whereDate('expired_at', '>',$date);
            }
            if($limit == 2) {
                $query->whereDate('expired_at', '<', $date);
            }
        } else {
            $limit = null;
        }
        if(empty($prefecture_id)) {
            $prefecture_id = '';
        }
        if(empty($price_id)) {
            $price_id = '';
        }
        if(empty($limit)) {
            $limit = '';
        }
        $products = $query->select('products.*')->orderBy('created_at', 'desc')->paginate(9);
        $categories = Category::all();
        return view('product.index', [
            'products' => $products,
            'categories' => $categories,
            'prefecture_id' => $pref_id,
            'price_id' => $price_id,
            'limit' => $limit,
        ]);
    }

    // 商品詳細表示
    public function detail($id)
    {
        $query = Product::query();
        $query->where('receive_flg', 0);
        $product = $query->where('id', $id)->first();
        $categories = Category::all();
        return view('product.detail', [
            'product' => $product,
            'categories' => $categories
        ]);
    }
}
