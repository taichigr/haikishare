<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::where('shop_id', Auth::id())->take(5)->orderBy('created_at', 'desc')->get();
        return view('shop.mypage.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
            $shop->password = $validatedData['password'];
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
