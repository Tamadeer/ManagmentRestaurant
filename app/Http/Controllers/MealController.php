<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals=Meal::all();

        return view('setting.meal',compact('meals'));
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
//        $photos = $request->file('image');

        $photos=$request->image;
        $file = $photos->getClientOriginalExtension();
//        dd($photos);
//        $file= $photos->getClientorignalExtension();
        $file_name=time().$file;
        $path='images/offers';
        $request->image->move($path,$file_name);
//        return"okey";
        Meal::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=> $file_name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
        ]);
        session()->flash('Add','تم أنشاء الطلب ');
        return redirect()->route('meal.index');
    }
    public function storephoto(Request $request)
    {
        $image=$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->store('users',$image,'locall');

        return $path;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        $meals=Meal::all();
        return view('orders.ordermeal',compact('meals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $meal= Meal::find($id);

        $meal->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$request->image,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
        ]);
        session()->flash('edit','تم التعديل');
        return redirect('/meal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Meal::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/meal');
    }
}
