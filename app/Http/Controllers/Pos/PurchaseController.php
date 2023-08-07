<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    public function purchaseAll(){
        return view('admin.purchase.purchase-all');

    }

    public function getPurchase(){
        $purchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();

        foreach ($purchases as $key => $purchase) {
            $purchase->supplier_name = $purchase->supplier->name;
            $purchase->unit_name = $purchase->unit->name;
            $purchase->category_name = $purchase->category->name;
            $purchase->product_name = $purchase->product->name;
        }

        return response()->json(['data' => $purchases]);
    }

    public function purchaseAdd(){

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('admin.purchase.purchase-add',compact('supplier','unit','category'));

    }
}
