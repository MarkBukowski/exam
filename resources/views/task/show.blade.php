@extends('layouts.content')

@section('data')

<div class="card-header"><h1>Task: {{$task->name}}</h1></div>
<div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">Task description: <b>{!!$task->task_description!!}</b></li>
        <li class="list-group-item">Status: <b>{!!$task->tasksStatus->name!!}</b></li>
        <li class="list-group-item">Added on: <b>{!!$task->add_date!!}</b></li>
        <li class="list-group-item">Updated on: <b>{!!$task->completed_date!!}</b></li>
    </ul>
    <div class="pt-3">
        <a class="btn btn-primary" href="{{route('task.edit', $task)}}">Edit</a>
        <a class="btn btn-primary" href="{{route('task.index', $task)}}">Back</a>
        <a class="btn btn-primary" href="{{route('task.pdf', $task)}}">Download PDF</a>
    </div>
</div>


@endsection
