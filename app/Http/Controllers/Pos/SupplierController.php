<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function supplierAll()
    {
        // $suppliers = Supplier::all();
        $suppliers = Suppliers::latest()->get();
        return view('admin.supplier.supplier-all',compact('suppliers'));
    }

    public function supplierAdd(){
        return view('admin.supplier.supplier-add');
    }

    public function supplierStore(Request $request){

        Suppliers::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => auth()->user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);

    } // End Method
}
