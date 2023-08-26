<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::all();
        return view('setting.addresses',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'region' => 'required|unique:addresses|max:255',
            'city' => 'required',

        ],[

            'region.required' =>'يرجي ادخال اسم المطعم',
            'region.unique' =>'اسم القسم مسجل مسبقا',
            'city.required' =>'يرجي ادخال الملاحظات',


        ]);


        Address::create([
            'region'=>$request->region,
            'city'=>$request->city,


        ]);
        session()->flash('Add','تم اضافة القسم');

        return redirect('/addresses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'region' => 'required|max:255|unique:addresses,region,'.$id,
            'city' => 'required',
        ],[

            'region.required' =>'يرجي ادخال اسم القسم',
            'region.unique' =>'اسم القسم مسجل مسبقا',
            'city.required' =>'يرجي ادخال البيان',

        ]);

        $addresses = Address::find($id);
        $addresses->update([
            'region' => $request->region,
            'city' => $request->city,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Address::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/addresses');
    }
}
