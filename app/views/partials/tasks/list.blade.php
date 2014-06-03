@foreach($tasks as $task)
<article>
    <h2><a href="{{ URL::route('tasks.show', $task->id) }}">{{ $task->title }}</a></h2>
    <p>{{ $task->description }}</p>
    
    <dl class="dl-horizontal">
        <dt>{{ Lang::get('tasks.list.task') }}</dt>
        <dd>{{ $task->type->title }}</dd>
        <dt>{{ Lang::get('tasks.list.reward') }}</dt>
        <dd>{{ $task->reward }}</dd>
    </dl>

	@if($task->tokenUrl)
	<p><a href="{{ $task->tokenUrl }}">{{ $task->tokenUrl }}</a></p>
	@endif
</article>
@endforeach