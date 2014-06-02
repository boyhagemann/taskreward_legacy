@foreach($tasks as $task)
<article>
    <h2><a href="{{ URL::route('tasks.show', $task->id) }}">{{ $task->title }}</a></h2>
    <p>{{ $task->description }}</p>
    
    <dl class="dl-horizontal">
        <dt>{{ Lang::get('tasks.list.task') }}</dt>
        <dd>Vul taak in</dd>
        <dt>{{ Lang::get('tasks.list.reward') }}</dt>
        <dd>Vul reward in</dd>
    </dl>
</article>
@endforeach