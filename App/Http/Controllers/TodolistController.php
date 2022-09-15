<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
// use App\Models\User;

class TodolistController extends Controller
{
    public function index(){

        // $todolists = todo::paginate(5);
        $todolists = todo::where('user_id',Auth::user() ->id)->paginate(5);
        
        return view('todolist.index',['todolists'=>$todolists]);
    }
    // public function index(){

    //     $todolists = todo::paginate(5);
        
        
        
        
    //     return view('todolist.index',['todolists'=>$todolists]);
    // }

    public function create(){
        return view('todolist.create');
    }

    public function store(Request $request){
        $content = $request -> validate([
            'content' => 'required|min:3' 
        ]);
        auth()->user()->todos()->create($content);

        return redirect()->route('root')->with('notuice','新增成功');
    }

    public function edit($id){
        $todolist = auth()->user()->todos->find($id);
        return view('todolist.edit',['todolist' => $todolist]);
    }

    public function show(Request $request,$id){
        $todolist = auth()->user()->todos->find($id);
        if ($todolist == true) {
            if ($todolist->state == true) {
            return redirect()->route('root')->with('notuice','此代辦事項已完成');
        } else {
            $state = true;
            $todolist -> update( compact('state'));
            return redirect()->route('root')->with('notuice','已完成一件代辦事項');
        }
        }else{
            return redirect()->route('root')->with('notuice','無法編輯此項目');
        }
        
        
        
    }

    public function destroy($id){
        $todolist = auth()->user()->todos->find($id);
        if ($todolist == true) {
            $todolist->delete();
        return redirect()->route('root')->with('notuice','刪除成功');
        }
        else {
            return redirect()->route('root')->with('notuice','無法編輯此項目');
        }
        
    }
}
