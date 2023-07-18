<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    // View all Supplier
    public function supplierAll()
    {
        // $suppliers = Supplier::all();
        $suppliers = Suppliers::latest()->get();
        return view('admin.supplier.supplier-all', compact('suppliers'));
    }

    // Redirect to Add Supplier Page
    public function supplierAdd()
    {
        return view('admin.supplier.supplier-add');
    }

    // Store Added Supplier in Database
    public function supplierStore(Request $request)
    {
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
    }

    // Redirect to Update Supplier page With Supplier ID
    public function supplierEdit($id)
    {
        $supplier = Suppliers::findOrFail($id);

        return view('admin.supplier.supplier-edit', compact('supplier'));
    }

    // Update Supplier Details into Database
    public function supplierUpdate(Request $request)
    {
        $sullier_id = $request->id;

        Suppliers::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => auth()->user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    // Delete Supplier
    public function supplierDelete($id)
    {
        Suppliers::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
