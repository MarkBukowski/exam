@extends('layouts.content')

@section('data')
    <div class="card-header"><h1>Task list</h1>
        <form action="{{route('task.index')}}" method="get">

            <fieldset>
                <legend>Filter tasks by status:</legend>
                <div class="inputs">
                    <select class="form-control" name="status_id">
                        <option value="0">--Select status--</option>
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}" @if($status_id == $status->id) selected @endif>{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <button class="btn btn-primary mt-2" type="submit">Go</button>
            <a class="btn btn-primary mt-2" href="{{route('task.index')}}">Reset</a>
        </form> <!--/.sort by -->
    </div>

    <div class=" mt-3 list-group d-flex justify-content-around flex-row align-items-center text-center">
        <div class="list-group font-weight-bold mw-20">Task name</div>
        <div class="list-group font-weight-bold mw-20">Status</div>
        <div class="list-group font-weight-bold mw-20">Added on</div>
        <div class="list-group font-weight-bold mw-20">More info</div>
        <div class="list-group font-weight-bold mw-20">Actions</div>
    </div>

        @forelse($tasks as $task)
            <div class="mb-3 p-0 pt-3 pb-3 card-header d-flex flex-row align-items-center text-center">
                <div class="data-table mw-20">{{$task->name}}</div>
                <div class="data-table mw-20">
                    @if($task->tasksStatus)
                        {{$task->tasksStatus->name}}
                    @else
                        -
                    @endif
                </div>

                <div class="data-table mw-20">
                    <div class="data-table">{{$task->created_at}}</div>
                </div>

                <div class="data-table mw-20">
                    <a class="btn btn-info" href="{{route('task.show', $task)}}">Info</a>
                </div>

                <div class="data-table mw-20 justify-content-center align-items-center">
                    <a class="btn btn-primary mb-2" href="{{route('task.edit', $task)}}">Edit</a>
                    <form method="POST" action="{{route('task.destroy', $task)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="no-tasks">
                <h4 class="text-center">No tasks asigned</h4>
            </div>
        @endforelse

@endsection
