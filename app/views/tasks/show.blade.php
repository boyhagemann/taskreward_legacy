@extends('layouts.default')

@section('content')

<article class="row task">

	<div class="col-lg-3 task__image_container">
		<img class="media-object" src="{{ $task->image  }}" alt="...">
	</div>

	<div class="col-lg-9">

		<h1 class="task__title i_title">{{ $task->title }}</h1>
		<p>{{ $task->description }}</p>

		<hr class="rule">

		@if($task->tokenUrl)
		<h3 class="task__action-title i_title">{{ Lang::get('tasks.show.task', ['task' => $task->task, 'reward' => $task->reward]) }}</h3>
		<div class="bg-success task__action-container">
			<a class="task__action-link" href="{{ $task->tokenUrl }}" target="_blank">{{ $task->tokenUrl }}</a>
		</div>
		@else
		<div>
			<a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-primary">{{ Lang::get('tasks.show.login') }}</a>
		</div>
		@endif

		<hr class="rule">


		<ul>
			<li>Share this link on your favorite social media.</li>
			<li>Mail this link to someone you know who.</li>
			<li>Stay on top of your stream to view all activity</li>
		</ul>

	</div>

</article>

@stop


@section('sidebar')


@stop

@section('bottom')

<h2>Task activity</h2>
@include('partials.stream.list')

@stop