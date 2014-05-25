@extends('layouts.default')

@section('content')

<h1>Dashboard</h1>

<div>
    <a href="{{ URL::route('invitation.create') }}" class="btn btn-primary btn-lg">Invite users</a>
</div>

<h1>My tasks</h1>
@include('partials.tasks.list');

@stop
