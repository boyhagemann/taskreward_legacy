@extends('layouts.default')

@section('content')

<h1>{{ Lang::choice('tasks.search.heading', $tasks->getTotal()) }}</h1>

<hr>

@if(Input::get('view') == 'grid')
@include('partials.tasks.grid')
@else
@include('partials.tasks.list')
@endif

{{ $tasks->links() }}

@stop