@extends('layouts.app')

@section('title', 'Welcome — ' . config('app.name'))

@section('content')
    <div class="card">
        <h1>Welcome</h1>
        <p>This is a simple Laravel app using Blade templates. Routing and views are working.</p>
        <p>Your environment is set up correctly for local development.</p>
        <p><small>Go to the <a href="{{ url('/item') }}">items page</a> for a second screen.</small></p>
    </div>
@endsection
