<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {

//        return view('orders.order');
        $order=Order::all();
        $rest=Restaurant::all();
        $meal=Meal::all();
        $category=Category::all();
        return view('orders.createorder',compact('order','rest','category'));

    }
    public function index1()
    {
        $order=Order::all();
        $rest=Restaurant::all();
        $meal=Meal::all();
        $category=Category::all();
        return view('orders.order',compact('order','rest','category','meal'));

    }

    public function indexshow()
    {
        return view('orders.indexshow');

    }
    public function create()
    {
        $rest=Restaurant::all();
        $meal=Meal::all()->join('caltegories','category.id','=','meal.category_id');
        $category=Category::all();

        return view('orders.createorder',compact('meal','rest','category'));
    }

    public function submit(Request $request){
//        return view('');
        dd($request->all());
    }
    public function store(Request $request)
    {
//        $meal=json_encode($request->meal);
//        $quantity=json_encode($request->quantity);
//        dd($quantity,$meal);
//

        $order=new Order();
        $convert_rest=Restaurant::where('name',$order->restaurant_id=request()->input('rest_name'))->first()->id;

        $order->restaurant_id=(($convert_rest));
        //dd( $order->restaurant_id);
//      $rest=where('name',$order->restaurant_id=request()->input('rest_name'))->pluck('id');
//      $order->restaurant_id=request()->input('$rest');
        $order->status=request()->input('status');
        $order->quantity=json_encode(request()->input('quantity_id'));
        $order->note=request()->input('note');
        $order->save();
//      $order->restaurant->category()->attach(json_encode(request()->input('category_id')));

//        $meal=Meal::where('name',request()->input('meal_name'))->first()->id;
//        $mealId=$meal->first()->id;
//        $order->meals()->attach($meal);

    for($i=0;$i < count(request()->input('meal_name'));$i++) {
        $meals=[];
//        $datasave = [
      $meals=Meal::where('name',request()->input('meal_name'))->value('id');
//      dd($meals);

//        $mealId=$meals[$i];

        $order->meals()->attach($meals);
//            'order_id' => $order->id,
//            'meal_id' => $meal,
//        'meal_id'=>request()->input('meal_name'),
//        ];

//        DB::table('order_meal')->insert($datasave);
    }

        session()->flash('Add','تم أنشاء الطلب ');
        return redirect()->route('order.index');
    }

    public function show($id)
    {

        $meal1=Meal::where("category_id", $id)->pluck('name');
//      $meal = Meal::whereIn('id', $id)->pluck('name');

//    اذا اخترت قسم بيطلعلي رقم المطاعم
//        $cat=Category::find($id);
//        $cat=Category::where("category_id", $id)->

    $test= DB::table("restaurant_category")
        ->where("category_id", $id)
        ->pluck('restaurant_id');


//        $meal = Category::join('meals', $id, '=', 'meals.category_id')
//            ->join('restaurant_category', 'restaurant_category.category_id', '=', $id)
//            ->get(['restaurant_category.restaurant_id', 'meals.name']);

//    $rest = Restaurant::whereIn('id', $test)->pluck('name');

//      return json_encode($meal1);
        $meal1_encode=json_encode($meal1);
//      $test_encode=json_encode($test);
        return $meal1_encode;
//        return view('orders.createorder',compact('meal1_encode','test_encode'));
    }
    public function show1($id)
    {

        $meal1=Meal::where("category_id", $id)->pluck('name');

        $test= DB::table("restaurant_category")
            ->where("category_id", $id)
            ->pluck('restaurant_id');
        $rest = Restaurant::whereIn('id', $test)->pluck('name');
        $meal1_encode=json_encode($rest);

        return $meal1_encode;
//        return view('orders.createorder',compact('meal1_encode','test_encode'));
    }

    public function show_price($meal_name)
    {
        $price=Meal::where("name", $meal_name)->pluck('price');
//        $test= DB::table("restaurant_category")
//            ->where("category_id", $id)
//            ->pluck('restaurant_id');
//        $rest = Restaurant::whereIn('id', $test)->pluck('name');
        $meal1_encode=json_encode($price);

        return $meal1_encode;
//        return view('orders.createorder',compact('meal1_encode','test_encode'));
    }
    public function edit(Order $order)
    {
        //
    }

    public function test_reapter(Request $request){
            $meal=$request->meal_name;
            $price=$request->price;
            $quantity=$request->quantity;

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $ord= Order::find($id);
//        dd($id);
        $ord->update([

//        DB::table('orders')->where('id',$id)->update([
            'restaurant_id'=>$request->restaurant_id,
             'name_meal'=>$request->name_meal,
            'status'=>$request->status,
             'note'=>$request->note,
        ]);
        $ord->meals()->attach($request->meals);
            session()->flash('edit','تم التعديل');
        return redirect('/order');
//        return redirect()->route('order.index');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        Order::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/order');
//        return redirect()->route('order.index');
//        return "ok";
    }
    public function getproducts($id): bool|string
    {
        $products = DB::table("restaurants")->where("restaurant_id", $id)->pluck("name", "id");
        return json_encode($products);
    }
}
