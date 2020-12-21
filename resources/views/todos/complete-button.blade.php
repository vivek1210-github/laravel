@if($todo->completed)
<span class="fa fa-check text-green-400 px-2 cursor-pointer"
onclick="event.preventDefault();
document.getElementById('form-incomplete-{{$todo->id}}').submit();"/>
<form id="{{'form-incomplete-'.$todo->id}}" style="display: none" method="post" action="{{route('todos.incomplete', ['todo' => $todo->id])}}">
    @csrf
    @method('delete')
</form>
@else
<span
onclick="event.preventDefault();
document.getElementById('form-complete-{{$todo->id}}').submit();"
class="fa fa-check text-gray-300 cursor-pointer px-2"/>
<form id="{{'form-complete-'.$todo->id}}" style="display: none" method="post" action="{{route('todos.complete', ['todo' => $todo->id])}}">
    @csrf
    @method('put')
</form>
@endif
