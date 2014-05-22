@extends('layouts.default')

@section('content')

<h1>{{ $stream->action->title }}</h1>
<h2>{{ $stream->message }}</h2>

@stop


@section('sidebar')


@stop