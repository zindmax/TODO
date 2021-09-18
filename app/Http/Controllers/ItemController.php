<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $todoItems = Item::query()->get()->sortDesc();

        return view('todos', ['todoItems' => $todoItems]);
    }

//    public function todoList()
//    {
//        $todoItems = Item::query()->get()->sortDesc();
//
//        return response()->json(['todoItems' => $todoItems]);
//    }

    public function store(Request $request)
    {
        $todoItem = new Item;

        $data = $request->all();

        $todoItem->item = $data['item'];

        $todoItem->save();

        return response()->json(['item' => $todoItem]);
    }

    public function delete($id)
    {
        Item::query()->findOrFail($id)->delete();

        return redirect('/');
    }

    public function complete(Request $request, $id) {

        $todoItem = Item::query()->findOrFail($id);

        if ($request->has('complete')){
            if (!$todoItem->complete){
                $todoItem->complete = true;
            }else{
                $todoItem->complete = false;
            }
        }

        $todoItem->save();

        return redirect('/');
    }
}
