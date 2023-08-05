<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use Storage;

class ProductController extends Controller
{
    public function productAll(){
        return view('admin.product.product-all');
    }

    public function getProduct(){
        $products = Product::get();

        foreach ($products as $key => $product) {
            $product->supplier_name = $product->supplier->name;
            $product->unit_name = $product->unit->name;
            $product->category_name = $product->category->name;
            $product->image_path = url('storage/upload/product/'.$product->product_image);
        }

        return response()->json(['data' => $products]);
    }

    public function productAdd(){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('admin.product.product-add',compact('supplier','category','unit'));
    }

    public function productStore(Request $request){


        $image = $request->file('product_image');
        $name_gen = $request->name.hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png

        $image->storeAs( '', $name_gen, 'productImage');

        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'product_image' => $name_gen,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('admin.product.product-edit',compact('product','supplier','category','unit'));
    }

    public function ProductUpdate(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'product_image' => $request->product_image,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }
}
