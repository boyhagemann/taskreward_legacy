@extends('layouts.default')

@section('content')

<h1>Dashboard</h1>

<div class="row">

	<div class="col-lg-4">
		<a href="{{ URL::route('invitation.create') }}" class="btn btn-primary btn-lg">Invite users</a>
	</div>

	<div class="col-lg-4">
		<h1>My tasks</h1>
		@include('partials.tasks.list');
	</div>

	<div class="col-lg-4">
		<h1>My rewards</h1>
		@include('partials.rewards.list');
	</div>

</div>

@stop
