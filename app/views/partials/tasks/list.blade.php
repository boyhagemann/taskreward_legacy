@foreach($tasks as $task)
<article>
    <h2><a href="{{ URL::route('tasks.show', $task->id) }}">{{ $task->product_title }}</a></h2>
    <p>{{ $task->product_description }}</p>
    
    <dl class="dl-horizontal">
        <dt>{{ Lang::get('tasks.list.task') }}</dt>
        <dd>{{ $task->task }}</dd>
        <dt>{{ Lang::get('tasks.list.reward') }}</dt>
        <dd>{{ $task->reward }}</dd>
    </dl>
</article>
@endforeach