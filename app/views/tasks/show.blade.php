@extends('layouts.default')

@section('content')

<article class="row task">

	<div class="col-lg-2 task__image_container">
		<img class="media-object" src="holder.js/120x120" alt="...">
	</div>

	<div class="col-lg-10">

		<h1>{{ $task->title }}</h1>
		<p>{{ $task->description }}</p>

		<h4><span class="label label-success">{{ Lang::get('tasks.show.badge') }}</span> {{ Lang::get('tasks.show.task', ['task' => $task->type->title, 'reward' => $task->reward]) }}</h4>

	</div>

</article>

@stop


@section('sidebar')

@if($task->tokenUrl)

<h3>{{ Lang::get('tasks.show.link_title') }}</h3>
<h4><a href="{{ $task->tokenUrl }}" target="_blank">{{ $task->tokenUrl }}</a></h4>

@else
<div>
	<a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-primary">{{ Lang::get('tasks.show.login') }}</a>
</div>
@endif

<hr>

<h3>Tips</h3>
<ul>
	<li>Share this link on your favorite social media.</li>
	<li>Mail this link to someone you know who.</li>
	<li>Stay on top of your stream to view all activity</li>
</ul>

@stop

@section('bottom')

<h2>Task activity</h2>
@include('partials.stream.list')

@stop