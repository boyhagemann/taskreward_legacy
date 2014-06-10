@if($rewards)

	@foreach($rewards as $reward)
	<article>
		<time>{{ $reward->created_at }}</time>
		<h4><a href="{{ URL::route('tasks.show', $reward->task->id) }}">{{ $reward->task->title }}</a></h4>
		<p><span class="label label-success">{{ $reward->value }} {{ $reward->currency }}</span></p>
	</article>
	@endforeach

@else

<p>{{ Lang::get('rewards.list.no_items') }}</p>
@endif