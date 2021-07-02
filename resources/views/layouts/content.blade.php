@extends('layouts.admin')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @yield('data')
                </div>
            </div>
        </div>
    </div>

@endsection
