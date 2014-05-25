@extends('layouts.default')

@section('content')

<h1>Profile</h1>

{{ BootForm::open() }}
    {{ BootForm::text('First Name', 'first_name') }}
    {{ BootForm::text('Last Name', 'last_name') }}
    {{ BootForm::text('Date of Birth', 'date_of_birth') }}
    {{ BootForm::submit('Submit') }}
{{ BootForm::close() }}

@stop
