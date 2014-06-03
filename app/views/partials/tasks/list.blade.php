<ul class="media-list">

	@foreach($tasks as $task)
	<li class="media task-list-item">
		<a class="pull-left" href="#">
			<img class="media-object" src="holder.js/80x80" alt="...">
		</a>

		<article class="media-body">

			<h1 class="media-heading task-list-item__title"><a href="{{ URL::route('tasks.show', $task->id) }}" class="task-list-item__title-link">{{ $task->title }}</a></h1>
			<p class="task-list-item__description">{{ $task->description }}</p>

			<dl class="dl-horizontal">
				<dt>{{ Lang::get('tasks.list.task') }}</dt>
				<dd>{{ $task->type->title }}</dd>
				<dt>{{ Lang::get('tasks.list.reward') }}</dt>
				<dd>{{ $task->reward }}</dd>
			</dl>

			@if($task->tokenUrl)
			<p class="bg-info col-lg-5 task-list-item__link"><a href="{{ $task->tokenUrl }}">{{ $task->tokenUrl }}</a></p>
			@endif

		</article>

	</li>
	@endforeach

</ul>