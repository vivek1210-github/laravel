

@if(session('message'))
    <small class="text-success">{{$slot}}</small>
   <div class="py-4 px-2 bg-green-300">{{session('message')}}</div>
@elseif(session('error'))
 <small class="text-danger">{{$slot}}</small>
   <div class="py-4 px-2 bg-red-300">{{session('error')}}</div>
@endif

@if ($errors->any())
    <div class="px-2 py-4 bg-red-300">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
