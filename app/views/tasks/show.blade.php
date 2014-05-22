@extends('layouts.default')

@section('content')

<h1>{{ $task->product_title }}</h1>
<p>{{ $task->product_description }}</p>

@stop


@section('sidebar')

<div>
    <a href="{{ URL::route('tasks.accept', $task->id) }}" class="btn btn-lg btn-primary">Let's do this!</a>
</div>

@stop