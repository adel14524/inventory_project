<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;

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
    } // End Method
}
