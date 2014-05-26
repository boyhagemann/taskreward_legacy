@extends('layouts.default')

@section('content')

<h5>{{ $moment->ago }}</h5>
<h1>{{ $moment->text }}</h1>

@stop


@section('sidebar')


@stop