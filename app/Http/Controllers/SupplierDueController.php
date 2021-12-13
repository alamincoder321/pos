<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\DueSupplier;
use Brian2694\Toastr\Facades\Toastr;

class SupplierDueController extends Controller
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

    public function person()
    {
        $suppliers = Supplier::latest()->get();
        return view('supdue.supdue', compact('suppliers'));   
    }

    public function SupduePay(Request $request)
    {
        $supduepay = new DueSupplier;
        $supduepay->supplier_id = $request->supplier_id;
        $supduepay->pay_due = $request->pay_due;
        $supduepay->pay_date = $request->pay_date;
        $supduepay->save();

        Toastr::success('Supplier pay due successfully!');
        return back();
    }
    
}
