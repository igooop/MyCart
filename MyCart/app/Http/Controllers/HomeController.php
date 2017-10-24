<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view('home', compact('products'));
    }

    public function ShowCart() {
        $cusID = Auth::user()->id;
        $carts = DB::table('carts')->where('CusID', '=', $cusID)->get();
        return view('cart', compact('carts'));
    }

    public function AddtoCart(Request $request) {
        $price = $request -> price;
        $Productname = $request -> Productname;
        $quantity = $request -> quantity;
        $image = $request -> image;
        $productID = $request -> productID;
        $cusID = $request -> cusID;

        $products = new Cart;
        $products -> price = $price;
        $products -> Productname = $Productname;
        $products -> quantity = $quantity;
        $products -> image = $image;
        $products -> productID = $productID;
        $products -> CusID = $cusID;
        $products -> save();

        return redirect('/home');
    }

    public function DeletetoCart(Request $request) {
        $productID = $request -> productID;
        $CusID = $request -> CusID;

        $delete = DB::table('carts')->where([
            ['productID', '=', $productID],
            ['CusID', '=', $CusID]
            ])->delete();

        return redirect('/show-cart');
    }

    public function UpdatetoCart(Request $request) {
        $quantity = $request -> quantity;
        $productID = $request -> productID;
        $CusID = $request -> CusID;

        $update = DB::table('carts')->where([
            ['productID', '=', $productID],
            ['CusID', '=', $CusID]
            ])->update(['quantity' => $quantity]);       
        return redirect('/show-cart');
    }
}
