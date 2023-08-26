<?php

namespace App\Http\Controllers;

use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants=Restaurant::all();
        return view('setting.restaurants',compact('restaurants'));
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
            'name' => 'required|unique:restaurants|max:255',
            'description' => 'required',

        ],[

            'name.required' =>'يرجي ادخال اسم المطعم',
            'name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال الملاحظات',


        ]);


                Restaurant::create([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'address_id'=>$request->address_id,

                ]);
               session()->flash('Add','تم اضافة القسم');

                return redirect('/restaurants');
//


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:restaurants,name,'.$id,
            'description' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        $restaurants = Restaurant::find($id);
        $restaurants->update([
            'name' => $request->name,
            'description' => $request->description,
            'address_id'=>$request->address_id,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Restaurant::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/restaurants');
    }
}
