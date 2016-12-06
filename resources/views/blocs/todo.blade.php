<div>
    <h4><a href="/{{$todo->slug}}">{{$todo->name}}</a></h4>
    <ul>
        @foreach($todo->tasks as $task)
            @include('blocs.task',$task)
        @endforeach
    </ul>
</div>