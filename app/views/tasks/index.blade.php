@extends('layouts.default')

@section('content')

<h1>{{ Lang::get('tasks.index.heading') }}</h1>

<hr>

@include('partials.tasks.list')

{{ $tasks->links() }}

@stop