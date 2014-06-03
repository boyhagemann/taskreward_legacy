@extends('layouts.default')

@section('content')

<h1>{{ $task->title }}</h1>
<p>{{ $task->description }}</p>

@if($task->tokenUrl)

<div class="col-lg-6">    
    <h2>{{ Lang::get('tasks.show.link_title') }}</h2>
    <div class="alert alert-info">
        <h4><a href="{{ $task->tokenUrl }}" target="_blank">{{ $task->tokenUrl }}</a></h4>
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

@else
<div>
    <a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-primary">{{ Lang::get('tasks.show.login') }}</a>
</div>
@endif

@stop


@section('bottom')

<h2>Task activity</h2>
@include('partials.stream.list')

@stop