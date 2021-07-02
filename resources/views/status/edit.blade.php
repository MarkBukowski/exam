@extends('layouts.content')

@section('data')
    <div class="card-header"><h1>Edit status info</h1></div>
    <form class="m-2" method="POST" action="{{route('status.update',$status)}}">

        <div class="form-group">
            <label for="InputStatusName">Status name:</label>
            <input class="form-control" id="InputStatusName" type="text" name="status_name" value="{{old('status_name', $status->name)}}">
            <small class="form-text text-muted">Enter status name</small>
        </div>
        @csrf
        <button class="btn btn-primary d-inline" type="submit">Edit</button>
        <a class="btn btn-secondary" href="{{route('status.index')}}">Cancel</a>
    </form>

@endsection
