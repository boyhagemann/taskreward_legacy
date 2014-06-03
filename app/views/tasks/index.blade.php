@extends('layouts.default')

@section('content')

{{ $tasks->links() }}

@include('partials.tasks.list')

{{ $tasks->links() }}

@stop