<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
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

    public function OrderPlace(Request $request)
    {

        $data               = new Order;
        $data->customer_id  = $request->customer_id;
        $data->invoice_no   = rand(1000000, 9999999);
        $data->pay_date     = $request->pay_date;
        $data->pay_type     = $request->pay_type;
        $data->month        = $request->month;
        $data->orderby      = $request->orderby;
        $data->pay_amount   = $request->pay_amount+$request->condition;
        $data->condition    = $request->condition;
        $data->due          = $request->total-$request->pay_amount-$request->discount-$request->condition;
        $data->discount     = $request->discount;
        $data->total        = $request->total;
        $data->save();

        $order_id = $data->id;
        $products = Cart::all(); 
        foreach($products as $product){
            $orderitem               = new OrderItem;
            $orderitem->order_id     = $order_id;
            $orderitem->product_id   = $product->product_id;
            $orderitem->name         = $product->product->name;
            $orderitem->weight       = $product->weight;
            $orderitem->unit_cost    = $product->product->unit_cost;
            $proStock=Product::where('id',$product->product_id)->first();
            $proStock->decrement('weight',$product->weight);
            $proStock->save();

            $orderitem->save();
        }

        Cart::where('user_ip', request()->ip())->delete();

        Toastr::success('Invoice Confirm Added on order table');
        return redirect()->route('details');
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('order.index', compact('orders'));
    }


    public function FinalInvoice($id)
    {
        $items = OrderItem::where('order_id', $id)->latest()->get();
        $finalinvoice = Order::findOrFail($id);
        return view('pos.finalinvoice', compact('finalinvoice', 'items'));
    }

}
