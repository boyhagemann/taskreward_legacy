@extends('layouts.default')

@section('content')

<h1>{{ Lang::get('payments.index.heading') }}</h1>

<hr>

@include('partials.payments.list')

{{ $payments->links() }}

@stop