@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <p class="text-2xl text-green-400 border-b pb-4">All Todos List</p>

    <a class="mx-2  px-1 text-blue-300  cursor-pointer text-white " href="/todos/create">
    <span class="fas fa-plus-circle"/>
    </a>
</div>
<x-alert />
      <ul class="list-disc my-4">
            @forelse($todos as $todo)
                <li class="flex justify-between p-2">
                    <div>  @include('todos.complete-button') </div>
                    @if($todo->completed)
                        <p class="line-through">{{$todo->title}}</p>
                    @else
                        <p>{{$todo->title}}</p>
                    @endif
                    <div>
                        <a class="mx-2 py-2 px-1 text-orange-400 cursor-pointer  rounded" href="{{route('todos.edit', $todo->id)}}">
                        <span class="fa fa-edit  px-2"/>
                        </a>
                        <span class="fa fa-trash cursor-pointer  text-red-400 px-2" onclick="event.preventDefault();
                        if(confirm('Are you really want to delete?')) {
                            document.getElementById('form-delete-{{$todo->id}}').submit();
                        }" />
                        <form id="{{'form-delete-'.$todo->id}}" style="display: none" method="post" action="{{route('todos.destroy', ['todo' => $todo->id])}}">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </li>
        @empty
                <div>No task exists, please create one</div>
        @endforelse
      </ul>
@endsection

