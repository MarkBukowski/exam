@extends('layouts.content')

@section('data')

    <div class="card-header"><h1>Add new status</h1></div>

    <div class="card-body">
        <form method="POST" action="{{route('status.store')}}">

            <div class="form-group">
                <label for="InputStatusName">Status name:</label>
                <input class="form-control" id="InputStatusName" type="text" name="status_name" value="{{old('status_name')}}">
                <small class="form-text text-muted">Enter status name</small>
            </div>

            @csrf
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{route('status.index')}}" class="btn btn-secondary" type="submit">Cancel</a>
        </form>
    </div>

@endsection
