@extends('layouts.default')

@section('content')

<h1>{{ $task->product_title }}</h1>
<p>{{ $task->product_description }}</p>

@if($token)

<div class="col-lg-6">    
    <h2>Your link</h2>
    <div class="alert alert-info">
        <h4><a href="{{ $token->url }}" target="_blank">{{ $token->url }}</a></h4>
    </div>
    <p>
        With this link we can trace back the task when it's completed.
        You cannot collect your reward if you don't use this link.
    </p>
</div>

<div class="col-lg-6">    
    <h2>Tips</h2>
    <ul>
        <li>Share this link on your favorite social media.</li>
        <li>Mail this link to someone you know who.</li>
        <li>Stay on top of your stream to view all activity</li>
    </ul>
</div>

@endif

@stop


@section('sidebar')

@if(!$token)
<div>
    <a href="{{ URL::route('tasks.accept', $task->id) }}" class="btn btn-lg btn-primary">Let's do this!</a>
</div>
@else

<h2>Task activity</h2>
@include('partials.stream.list')

@endif

@stop