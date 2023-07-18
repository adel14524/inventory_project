<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    // View all customer
    public function customerAll()
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.customer-all', compact('customers'));
    }

    public function customerAdd()
    {
        return view('admin.customer.customer-add');
    }
}
