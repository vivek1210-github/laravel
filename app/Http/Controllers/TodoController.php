<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request) {

            // $rules = [
            //     'title' => 'required|max:10',
            // ];

            // $messages = [
            //       'title.required' => 'Todo title cannot be blank',
            //      'title.max' => 'Todo title should not be more than 10 in length'
            // ];



            // $validator = Validator::make($request->all(), $rules, $messages);

            // if ($validator->fails()) {
            //     return redirect('todos/create')
            //                 ->withErrors($validator)
            //                 ->withInput();
            // }

            // store
             Todo::create($request->all());
             return redirect()->back()->with('message', 'Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo) {
                  $todo->update(['title' => $request->title]);
                  return redirect()->route('todos.index')->with('message', 'Todo Created Successfully');
    }


}
