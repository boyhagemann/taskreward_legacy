@extends('layouts.default')

@section('content')

<article class="row payment">

	<div class="col-lg-10">

		<h1>{{ Lang::get('payments.show.heading') }}</h1>
		<time>{{ $payment->created_at }}</time>
		<div><span class="badge badge-info">{{ $payment->status }}</span></div>
		<p>{{ $payment->value }} {{ $payment->currency }}</p>

		<hr>


		<h3>{{ Lang::get('payments.show.rewards.heading') }}</h3>
		@include('partials.rewards.list', ['rewards' => $payment->rewards])

		<ul>
			<li>Share this link on your favorite social media.</li>
			<li>Mail this link to someone you know who.</li>
			<li>Stay on top of your stream to view all activity</li>
		</ul>

	</div>

</article>

@stop


@section('sidebar')


@stop

@section('bottom')


@stop