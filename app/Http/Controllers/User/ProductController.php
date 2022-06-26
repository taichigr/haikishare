<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\NotifyPurchaseShop;
use App\Mail\NotifyPurchaseUser;
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
        $product->user_id = null;
        $product->save();
        return back();
    }

    // 商品購入処理（メールをユーザーとコンビニに送信）
    public function purchase(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('user.login');
        }
        // Mail::to(Auth::user()->email)->send(new NotifyPurchaseUser());
        $purchaser = Auth::user();

        $query = Product::query();
        $query->where('receive_flg', 0);
        $product = $query->where('id', $request->product_id)->first();
        $product->user_id = $purchaser->id;
        $product->save();

        Mail::to('taichan_yade@yahoo.co.jp')->send(new NotifyPurchaseUser($product));
        Mail::to('taichan_yade@yahoo.co.jp')->send(new NotifyPurchaseShop($product, $purchaser));
        // return redirect()->route('product.index');
        return back();
    }

    // ユーザーが購入済みの商品一覧
    public function purchaseIndex()
    {
        //
        $query = Product::query();
        $query->where('receive_flg', 0);
        $products = $query->where('user_id', Auth::id())->take(5)->orderBy('updated_at', 'desc')->paginate(5);

        return view('user.purchased.index', ['products' => $products]);
    }
}
