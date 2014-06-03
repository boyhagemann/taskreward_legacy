@extends('layouts.default')

@section('content')

<h1>{{ Lang::choice('tasks.search.heading', $tasks->getTotal()) }}</h1>

<hr>

@include('partials.tasks.list')

{{ $tasks->links() }}

@stop