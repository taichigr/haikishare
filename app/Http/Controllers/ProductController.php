<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        dd('product.index');
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
        dd('product.show');

    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('user.product.detail', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function purchase(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $product->user_id = Auth::id();
        $product->save();
        return redirect()->route('product.index');
    }
}
