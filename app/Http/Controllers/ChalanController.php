<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class ChalanController extends Controller
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

    public function index()
    {
        $total = Cart::where('user_ip', request()->ip())->get()->sum(
            function($t){
                return $t->weight * $t->product->unit_cost;
            }
        );

        $products = Product::where('status', 1)->latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        $customers = Customer::where('status', 1)->latest()->get();
        $carts     = Cart::where('user_ip', request()->ip())->latest()->get();
        return view('pos.newpos', compact('products', 'categories', 'customers', 'carts', 'total'));
    }
    
}
