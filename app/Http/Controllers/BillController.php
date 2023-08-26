<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{


    public function index(){
        $sections=Bill::all();
        return view('invoices.bills',compact('sections'));
    }
    public function store(Request $request){
        Bill::create([
            'order_id'=>$request->order_id,
            'price'=>$request->price,
        ]);
//            session()->flash('Add','تم اضافة القسم');
        return redirect()->route('bill.index');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $sections = Bill::find($id);
//        dd($id);
        $sections->update([
            'order_id'=>$request->order_id,
            'price'=>$request->price,
        ]);

        session()->flash('edit','تم تعديل الفاتورة بنجاج');
        return redirect('/bill');
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
        Bill::find($id)->delete();
        session()->flash('delete','تم حذف الفاتورة بنجاح');
        return redirect('/bill');
    }
}
