<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

// ユーザー情報に関わる処理
class MypageController extends Controller
{

    // ユーザーマイページ表示
    public function index()
    {
        //
        $products = Product::where('user_id', Auth::id())->take(5)->get();
        return view('user.mypage.index', ['products' => $products]);
    }


    // ユーザー情報編集画面表示
    public function edit($id)
    {
        //
        if($id != Auth::id()) {
            return redirect('/');
        }
        $user = User::where('id', Auth::id())->first();
        return view('user.mypage.edit', ['user' => $user]);
    }

    // ユーザー情報更新処理
    public function update(Request $request, $id)
    {
        //
        if($id != Auth::id()) {
            return redirect('/');
        }
        $user = User::where('id', $id)->first();
        if ($request->password && $request->password_confirmation) {
            // パスワードが入っているときの処理　
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shops')->ignore($id)],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password =  Hash::make($validatedData['password']);
        } else {
            // パスワードが入っていないときの処理
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shops')->ignore($id)],
            ]);
        }
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();
        return redirect()->route('user.mypage.index');
    }

    // ユーザー退会画面表示
    public function withdrawShow()
    {
        $user = Auth::user();
        // 受け取り完了していない商品があった場合
        $product = Product::where('user_id', $user->id)->where('receive_flg', 0)->first();
        if(!empty($product)) {
            $withdrawFlg = false;
        } else {
            $withdrawFlg = true;
        }
        return view('user.mypage.withdraw', ['withdrawFlg' => $withdrawFlg]);
    }

    // ユーザー退会処理
    public function withdraw()
    {
        $user = Auth::user();
        // 受け取り完了していない商品があった場合
        $product = Product::where('user_id', $user->id)->where('receive_flg', 0)->first();
        if(!empty($product)) {
            return back();
        }
        $user->delete();
        Auth::logout();
        return redirect()->route('user.register');
    }
}
