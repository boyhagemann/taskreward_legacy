
@foreach($tasks as $task)
<h2><a href="{{ URL::route('tasks.show', $task->id) }}">{{ $task->product_title }}</a></h2>
@endforeach