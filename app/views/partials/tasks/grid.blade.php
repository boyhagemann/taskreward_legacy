<ul class="task-grid list-unstyled">

	@foreach($tasks as $task)
	<li class="col-md-4 task-grid__item">

		<article class="thumbnail task-grid__body">

			<a class="task-grid__image-container" href="#">
				<img class="media-object" src="{{ $task->imageSmall }}" alt="...">
			</a>

			<div class="caption">

				<h1 class="media-heading task-grid__title"><a href="{{ URL::route('tasks.show', $task->id) }}" class="task-grid__title-link">{{ $task->title }}</a></h1>

				<p class="clearfix">
					<a href="{{ URL::route('tasks.show', $task->id) }}" class="btn btn-xs btn-default">{{ Lang::get('tasks.grid.action', ['task' => $task->task, 'reward' => $task->reward]) }}</a>
				</p>

			</div>

		</article>

	</li>
	@endforeach

</ul>