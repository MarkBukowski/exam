@extends('layouts.content')

@section('data')
    <div class="card-header"><h1>Edit task info</h1></div>
    <form class="m-2" method="POST" action="{{route('task.update',$task)}}">

        <div class="form-group">
            <label for="InputTaskName">Task's name:</label>
            <input class="form-control" id="InputTaskName" type="text" name="task_name" value="{{old('task_name', $task->name)}}">
            <small class="form-text text-muted">Enter task's name</small>
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="InputTaskSurname">Task's details:</label>--}}
{{--            <input class="form-control" id="InputTaskSurname" type="text" name="task_description" value="{{old('task_description', $task->task_description)}}">--}}
{{--            <small class="form-text text-muted">Enter task's details</small>--}}
{{--        </div>--}}


        <div class="form-group">
            <label>Task details:</label>
            <textarea name="task_description" id="summernote">{{old('task_description', $task->task_description)}}</textarea>
            <small class="form-text text-muted">Enter task details</small>
        </div>

        <select class="form-control d-block" name="status_id">
            <option value="0">--Select status--</option>
            @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
        </select>
            <small class="form-text text-muted mb-3">Select task's status</small>

        @csrf
        <button class="btn btn-primary d-inline" type="submit">Edit</button>
        <a class="btn btn-secondary" href="{{route('task.index')}}">Cancel</a>
    </form>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

@endsection
