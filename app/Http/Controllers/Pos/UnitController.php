<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UnitController extends Controller
{
    public function UnitAll(){
        return view('admin.unit.unit-all');
    }

    public function getAjax(){

        $units = Unit::latest()->get();
        return response()->json(['data' => $units]);
    }

    public function unitAdd(){
        return view('admin.unit.unit-add');
    }

    public function unitStore(Request $request){

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitEdit($id){

        $unit = Unit::findOrFail($id);
      return view('admin.unit.unit-edit',compact('unit'));

    }

    public function unitUpdate(Request $request){

        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);

    }

    public function unitDelete($id){

        Unit::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
