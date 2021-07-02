@extends('layouts.content')

@section('data')

    <div class="card-header"><h1>Add new task</h1></div>

    <div class="card-body">
        <form method="POST" action="{{route('task.store')}}">

            <div class="form-group">
                <label for="InputTaskName">Task name:</label>
                <input class="form-control" id="InputTaskName" type="text" name="task_name" value="{{old('task_name')}}">
                <small class="form-text text-muted">Enter task name</small>
            </div>

            <div class="form-group">
                <label for="InputTaskDescription">Task details:</label>
                <textarea name="task_description" id="summernote">{{old('task_description')}}</textarea>
                <small class="form-text text-muted">Enter task details</small>
            </div>

            <select class="form-control mb-3 d-block" name="status_id">
                <option value="0">--Select Status--</option>
                @foreach ($statuses as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
            <small class="form-text text-muted mb-3">Select task status</small>
            @csrf
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{route('task.index')}}" class="btn btn-secondary" type="submit">Cancel</a>
        </form>
    </div>
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
