<ul class="media-list task-list">

	@foreach($tasks as $task)
	<li class="media task-list__item">
		{{ $task->image }}
		<a class="pull-left" href="#">
			<img class="media-object" src="{{ $task->imageSmall }}" alt="...">
		</a>

		<article class="media-body">

			<h1 class="media-heading task-list__title"><a href="{{ URL::route('tasks.show', $task->id) }}" class="task-list__title-link">{{ $task->title }}</a></h1>
			<p class="task-list-item__description">{{ $task->description }}</p>

			<dl class="dl-horizontal task-list__dl">
				<dt class="task-list__dt">{{ Lang::get('tasks.list.task') }}</dt>
				<dd class="task-list__dd">{{ $task->type->title }}</dd>
				<dt class="task-list__dt">{{ Lang::get('tasks.list.reward') }}</dt>
				<dd class="task-list__dd">{{ $task->reward }}</dd>
			</dl>

			@if($task->tokenUrl)
			<p class="bg-info col-lg-5 task-list-item__link"><a href="{{ $task->tokenUrl }}">{{ $task->tokenUrl }}</a></p>
			@endif

		</article>

	</li>
	@endforeach

</ul>