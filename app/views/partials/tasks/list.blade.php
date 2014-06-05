<ul class="media-list task-list">

	@foreach($tasks as $task)
	<li class="media task-list__item">

		<a class="pull-left task-list__image-container" href="#">
			<img class="media-object" src="{{ $task->imageSmall }}" alt="...">
		</a>

		<article class="media-body">

			<h1 class="media-heading task-list__title"><a href="{{ URL::route('tasks.show', $task->id) }}" class="task-list__title-link">{{ $task->title }}</a></h1>
			<p class="task-list-item__teaser">{{ $task->teaser }}</p>

			<a href="{{ URL::route('tasks.show', $task->id) }}" class="btn btn-xs btn-success">{{ Lang::get('tasks.list.action', ['task' => $task->task, 'reward' => $task->reward]) }}</a></dd>

			@if($task->tokenUrl)
			<p class="bg-info col-lg-5 task-list-item__link"><a href="{{ $task->tokenUrl }}">{{ $task->tokenUrl }}</a></p>
			@endif

		</article>

	</li>
	@endforeach

</ul>