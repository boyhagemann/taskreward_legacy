@extends('layouts.default')

@section('content')

<h1>Dashboard</h1>

<div class="row">

	<div class="col-lg-6">
		<h2>{{ Lang::get('user.dashboard.tasks.title') }}</h2>
		@if($tasks)
		@include('partials.tasks.list')
		@else
		{{ Lang::get('user.dashboard.tasks.empty') }}
		@endif
	</div>

	<div class="col-lg-6">
		<h2>{{ Lang::get('user.dashboard.rewards.title') }}</h2>
		@if($rewards)
		@include('partials.rewards.list')
		@else
		{{ Lang::get('user.dashboard.rewards.empty') }}
		@endif
	</div>

</div>

@stop

@section('sidebar')

<div class="row">

	<div class="col-lg-4">
		<a href="{{ URL::route('invitation.create') }}" class="btn btn-primary btn-lg">Invite users</a>
	</div>

</div>

@stop