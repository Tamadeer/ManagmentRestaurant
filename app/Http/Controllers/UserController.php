<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $sections=User::all();
        return view('permissions.user',compact('sections'));
    }
    public function store(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
        ]);
//            session()->flash('Add','تم اضافة القسم');
        return redirect()->route('user.index');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $sections = User::find($id);
//        dd($id);
        $sections->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
        ]);

        session()->flash('edit','تم تعديل الفاتورة بنجاج');
        return redirect('/user');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        Usre::find($id)->delete();
        session()->flash('delete','تم حذف الفاتورة بنجاح');
        return redirect('/user');
    }
}
