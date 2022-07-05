<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\NotifyPurchaseShop;
use App\Mail\NotifyPurchaseUser;
use App\Mail\NotifyCancelShop;
use App\Mail\NotifyCancelUser;
use Illuminate\Support\Facades\Mail;

// ユーザー側の商品に関わる処理
class ProductController extends Controller
{
    // 購入キャンセル処理
    public function cancel(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if($product->user_id != Auth::id()) {
            return redirect()->route('user.mypage.index');
        }
        $purchaser = Auth::user();
        $product->user_id = null;
        $product->save();

        // メール送信
        Mail::to($purchaser->email)->send(new NotifyCancelUser($product));
        Mail::to($product->shop->email)->send(new NotifyCancelShop($product, $purchaser));
        return back();
    }

    // 商品購入処理（メールをユーザーとコンビニに送信）
    public function purchase(Request $request)
    {
        if(!Auth::check()) {
            if(!preg_match('/detail/', url()->previous())) {
                session()->put('product_url', route('product.detail', ['product' => $request->product_id]));
            }
            return redirect()->route('user.login');
        }
        $purchaser = Auth::user();

        $query = Product::query();
        $query->where('receive_flg', 0);
        $product = $query->where('id', $request->product_id)->first();
        $product->user_id = $purchaser->id;
        $product->save();

        Mail::to($purchaser->email)->send(new NotifyPurchaseUser($product));
        Mail::to($product->shop->email)->send(new NotifyPurchaseShop($product, $purchaser));
        return back();
    }

    // ユーザーが購入済みの商品一覧
    public function purchaseIndex()
    {
        //
        $query = Product::query();
        $query->where('receive_flg', 0);
        $products = $query->where('user_id', Auth::id())->take(5)->orderBy('created_at', 'desc')->paginate(5);

        return view('user.purchased.index', ['products' => $products]);
    }
}
