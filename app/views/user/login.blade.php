@extends('layouts.default')

@section('content')

<h1>Login</h1>

{{ BootForm::open(['route' => 'user.auth']) }}
    {{ BootForm::email('Email', 'email') }}
    {{ BootForm::password('Password', 'password') }}
    {{ BootForm::submit('Log in') }}
{{ BootForm::close() }}

@stop
