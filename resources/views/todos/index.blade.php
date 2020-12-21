@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <p class="text-2xl text-green-400">All Todos List</p>
    <a class="mx-2 py-2 px-1 bg-blue-300  cursor-pointer text-white rounded" href="/todos/create">Create New</a>
</div>

      <ul class="list-disc my-4">
        @foreach($todos as $todo)
        <li class="flex justify-center py-2">
            <p>{{$todo->title}}</p>
            <a class="mx-2 py-2 px-1 bg-green-400  cursor-pointer  rounded" href="{{'/todos/'.$todo->id.'/edit/'}}">Edit</a>
        </li>
       @endforeach
      </ul>

@endsection

