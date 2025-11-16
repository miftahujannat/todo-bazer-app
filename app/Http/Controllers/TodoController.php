<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $todos = Todo::latest()->get();
        return view(view: 'home',data: compact(var_name:'todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postTodo(Request $request)
    {
       $image = null;
       if(isset($request->picture)){
        $image = time(). '_'.$request->picture->getClientOriginalName(). '_'.$request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('pictures'),$image);
       };
       Todo::create([
         'name'=>$request->name,
         'price'=>$request->price,
         'picture'=>$image
       ]);
       return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateStatus($id)
    {
        $todo = Todo::findOrFail($id);
        // dd($todo);
        $todo->complete=!$todo->complete;
        $todo->save();
        return redirect('/');

    }

    /**

     * Show the form for updating the specified resource.
     */
    public function update(Request $request,$id)
    {
        $todo = Todo::findOrFail($id);
        $image =  $todo->picture;

        $image = null;
        if(isset($request->picture)){
            if($todo->picture){
                unlink('picture/',$image);
            }
        }
        if(isset($request->picture)){
        $image = time(). '_'.$request->picture->getClientOriginalName(). '_'.$request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('pictures'),$image);
    };

    $todo->name = $request->name;
    $todo->price = $request->price;
    $todo->picture = $image;

    $todo->save();
    return redirect('/');

}

    /**
     * edit the specified resource in storage.
     */
    public function edit($id)
    {
       $todo = Todo::findOrFail($id);
       return view('update', compact('todo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
         if($todo->picture){
            unlink('pictures/'.$todo->picture);
            };
            $todo->delete();
            return redirect('/');
    }
}
