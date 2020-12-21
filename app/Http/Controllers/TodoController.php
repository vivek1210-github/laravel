<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function __construct()
    {
         //  $this->middleware('auth')->except('index');
         $this->middleware('auth');
    }

    public function index() {
      //  $todos = Todo::orderBy('completed')->get();
      //$todos = auth()->user()->todos(); // ->orderBy('completed')->get() define in User model relationship
       // $todos = auth()->user()->todos()->orderBy('completed')->get();
       $todos =  auth()->user()->todos->sortBy('completed');


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
            //dd(auth()->user()->todos);
             //$user = auth()->id();
             //Todo::create($request->all());
             auth()->user()->todos()->create($request->all());
             return redirect()->route('todos.index')->with('message', 'Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {

        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
                  $todo->update(['title' => $request->title]);
                  return redirect()->route('todos.index')->with('message', 'Todo Updated Successfully');
    }

    public function complete(Todo $todo) {
                 $todo->update(['completed' => true]);
                 return redirect()->back()->with('message', 'Todo completed');
    }

    public function incomplete(Todo $todo) {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Todo set uncompleted');
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back()->with('message', 'Todo deleted');
    }


}
