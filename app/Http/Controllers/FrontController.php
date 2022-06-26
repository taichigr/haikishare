<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品一覧（ユーザー・コンビニ共通）
    public function index()
    {
        //
        return view('front.index');
    }
}
