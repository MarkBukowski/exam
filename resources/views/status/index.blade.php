@extends('layouts.content')

@section('data')
    <div class="card-header"><h1>Status list</h1></div>

    <div class=" mt-3 list-group d-flex justify-content-around flex-row align-items-center text-center">
        <div class="list-group font-weight-bold mw-25">Status name</div>
        <div class="list-group font-weight-bold mw-25">Actions</div>
    </div>

        @forelse($statuses as $status)

            <div class="mb-3 p-0 pt-3 pb-3 card-header d-flex flex-row align-items-center text-center">
                <div class="data-table" style="width: 50%;">{{$status->name}}</div>

                <div class="data-table" style="width: 50%;">
                    <a class="btn btn-primary mb-2" href="{{route('status.edit', $status)}}">Edit</a>
                    <form method="POST" action="{{route('status.destroy', $status)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h4>No statuses assigned</h4>
            </div>
        @endforelse


@endsection
