<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    public function index(){
        $sections=Coupon::all();
        $rest=Restaurant::all();
        return view('setting.coupons',compact('sections','rest'));
    }

    public function store(Request $request){
        Coupon::create([
            'restaurant_id'=>$request->restaurant_id,
            'name'=>$request->name,
            'code'=>$request->code,
            'rabat_type'=>$request->rabat_type,
            'rabat_value'=>$request->rabat_value,
            'valid_from'=>$request->valid_from,
            'valid_for'=>$request->valid_for,
            'status'=>$request->status,
        ]);
//            session()->flash('Add','تم اضافة القسم');
        return redirect()->route('coupons.index');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $sections = Coupon::find($id);
//        dd($id);
        $sections->update([
            'restaurant_id'=>$request->restaurant_id,
            'name'=>$request->name,
            'code'=>$request->code,
            'rabat_type'=>$request->rabat_type,
            'rabat_value'=>$request->rabat_value,
            'valid_from'=>$request->valid_from,
            'valid_for'=>$request->valid_for,
            'status'=>$request->status,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Coupon::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/coupons');
    }
}
