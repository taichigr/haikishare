<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

// コンビニ側店舗情報関連処理
class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // コンビニ側マイページ表示
    public function index()
    {
        //
        $query = Product::query();
        $query->where('receive_flg', 0);
        $sellProducts = $query->where('shop_id', Auth::id())->take(5)->orderBy('created_at', 'desc')->get();
        $query = Product::query();
        $query->where('shop_id', Auth::id())
            ->whereNotNull('user_id')
            ->take(5)
            ->orderBy('updated_at', 'desc');
        $soldProducts = $query->get();
        return view('shop.mypage.index', [
            'sellProducts' => $sellProducts,
            'soldProducts' => $soldProducts,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // コンビニ側マイページ編集画面表示
    public function edit($id)
    {
        //
        if($id != Auth::id()) {
            return redirect('/');
        }
        $shop = Shop::where('id', $id)->first();
        return view('shop.mypage.edit', ['shop' => $shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // コンビニ側マイページ情報更新処理
    public function update(Request $request, $id)
    {
        //
        if($id != Auth::id()) {
            return redirect('/');
        }
        $shop = Shop::where('id', $id)->first();
        if ($request->password && $request->password_confirmation) {
            // パスワードが入っているときの処理　
            $validatedData = $request->validate([
                'shop_name' => ['required', 'string', 'max:255'],
                'branch_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shops')->ignore($id)],
                'prefecture_id' => ['required', 'numeric', 'digits_between:1,2'],
                'address' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $shop->password =  Hash::make($validatedData['password']);
        } else {
            // パスワードが入っていないときの処理
            $validatedData = $request->validate([
                'shop_name' => ['required', 'string', 'max:255'],
                'branch_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('shops')->ignore($id)],
                'prefecture_id' => ['required', 'numeric', 'digits_between:1,2'],
                'address' => ['required', 'string', 'max:255'],
            ]);
        }
        $shop->name = $validatedData['shop_name'];
        $shop->branch_name = $validatedData['branch_name'];
        $shop->email = $validatedData['email'];
        $shop->prefecture_id = $validatedData['prefecture_id'];
        $shop->address = $validatedData['address'];
        $shop->save();
        return redirect()->route('shop.mypage.index');
    }

    // ユーザー退会画面表示
    public function withdrawShow()
    {
        return view('shop.mypage.withdraw');
    }

    // ユーザー退会処理
    public function withdraw()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect()->route('shop.register');
    }
}
