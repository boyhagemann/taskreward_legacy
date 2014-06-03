@if($rewards)

	@foreach($rewards as $reward)
	<article>
		<h3>{{ $reward->task->product_title }}</h3>
		<p>{{ $reward->value }} {{ $reward->currency }}</p>
	</article>
	@endforeach

@else

<p>{{ Lang::get('rewards.list.no_items') }}</p>
@endif