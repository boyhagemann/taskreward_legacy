@extends('layouts.default')

@section('content')

<h1>Invite your friends</h1>

@if(Session::get('result'))

<ul class="list-unstyled">
@foreach(Session::get('result') as $result)
    
    <li class="
        @if($result['success'])
        bg-success
        @else
        bg-warning
        @endif
        ">{{ $result['message'] }}</li>

@endforeach
    
</ul>

@endif

{{ BootForm::open()->action(URL::route('invitation.store')) }}
    {{ BootForm::textarea('Email addresses', 'emails') }}
    {{ BootForm::submit('Send invitation') }}
{{ BootForm::close() }}

@stop
