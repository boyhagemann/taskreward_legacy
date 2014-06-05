<ul class="media-list task-list">

	@foreach($tasks as $task)
	<li class="media task-list__item">

		<a class="pull-left task-list__image-container" href="#">
			<img class="media-object" src="{{ $task->imageSmall }}" alt="...">
		</a>

		<article class="media-body task-list__body">

			<h1 class="media-heading task-list__title"><a href="{{ URL::route('tasks.show', $task->id) }}" class="task-list__title-link">{{ $task->title }}</a></h1>

			@if($task->tokenUrl)
			<a href="{{ $task->tokenUrl }}" class="task-list-item__link">{{ $task->tokenUrl }}</a>
			@endif

			<p class="task-list-item__teaser pull-left">{{ $task->teaser }}</p>

			<p class="clearfix">
				<a href="{{ URL::route('tasks.show', $task->id) }}" class="btn btn-xs btn-success">{{ Lang::get('tasks.list.action', ['task' => $task->task, 'reward' => $task->reward]) }}</a>
			</p>

		</article>

	</li>
	@endforeach

</ul>