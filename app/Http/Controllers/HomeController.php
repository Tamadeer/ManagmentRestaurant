<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }
    public function lending(){
        $order=Order::all();
        $rest=Restaurant::all();
        $meal=Meal::all();
        $category=Category::all();
        return view('orders.lending',compact('order','rest','category','meal'));

    }
}
