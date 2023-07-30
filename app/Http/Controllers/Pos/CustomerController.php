<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class CustomerController extends Controller
{
    // View all customer
    public function customerAll()
    {
        return view('admin.customer.customer-all');
    }

    public function getCustomer()
    {
        $customers = Customer::latest()->get();

        foreach ($customers as $key => $cust) {
            $cust->image_path = url('storage/upload/customer/'.$cust->customer_image);
        }

        return response()->json(['data' => $customers]);
    }

    public function customerAdd()
    {
        return view('admin.customer.customer-add');
    }

    public function customerStore(Request $request){

        $image = $request->file('customer_image');
        $name_gen = $request->name.hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        $image->storeAs( '', $name_gen, 'customerImage');
        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $name_gen ,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }

    public function customerEdit($id){

        $customer = Customer::findOrFail($id);
        return view('admin.customer.customer-edit',compact('customer'));

    }


    public function customerUpdate(Request $request){
        $customer_id = $request->id;

        if ($request->file('customer_image')) {

            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'customer_image' => $save_url ,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);

        } else{

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);

        }

    }

    public function customerDelete($id){

        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
