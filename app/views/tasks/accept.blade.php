@extends('layouts.default')

@section('content')

<h1>{{ $task->product_title }}</h1>
<p>{{ $task->product_description }}</p>

<div class="alert alert-info">
    <a href="">http://domain.com/{{ $token->key }}</a>
</div>
    

<h3>Tips</h3>

<ol>
    <li>Share this link on your Facebook or Twitter account</li>
</ol>

@stop


@section('sidebar')


@stop