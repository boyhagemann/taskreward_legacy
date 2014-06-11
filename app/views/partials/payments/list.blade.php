@if($payments->count())

	@foreach($payments as $payment)
	<article>
		<a href="{{ URL::route('payments.show', $payment->id) }}"><time>{{ $payment->created_at }}</time></a>
		<span class="label label-success">{{ $payment->value }} {{ $payment->currency }}</span>
		<span class="badge badge-info">{{ $payment->status }}</span>
	</article>
	@endforeach

@else

<p>{{ Lang::get('payments.list.empty') }}</p>
@endif