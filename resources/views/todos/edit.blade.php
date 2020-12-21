@extends('todos.layout')

@section('content')
<x-alert />

<div class="row">
    <div class="col-md-6">

        <p class="text-2xl">Edit Todo</p>

     <form method="post" action="{{route('todo.update', $todo->id)}}" class="py-5">
         @csrf
         @method('patch')
         <div class="mb-3">
           <label for="exampleInputEmail1" class="form-label">Title</label>
           <input type="text" name="title" class="py-2 px-3 border rounded-lg " value="{{$todo->title}}"/>
          </div>
              <button type="submit" class="p-2 border rounded-lg ">Update</button>
       </form>
    </div>
    <div>
        <a class="mx-2 py-2 px-1 bg-blue-300  cursor-pointer text-white rounded" href="/todos">View All Todos</a>
    </div>
</div>

@endsection
